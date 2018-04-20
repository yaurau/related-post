<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Yaurau_IP_Blocker
{
    public $set;
    /*
    * Function name: getidIPDB
    * Purpose: get IP and id
    */


    static public function getidIPDB()
    {
        $valueIP = Yaurau_IP_Blocker_DB::loadidIPDB();
        return $valueIP;
    }
    /*
    * Function name: getidIPRepository
    * Purpose: get id and IP fo repository
    */
    static public function getidIPRepository()
    {
        $valueIP = Yaurau_IP_Blocker_DB::loadidIPRepository();
        return $valueIP;

    }
    /*
    * Function name: enterIP
    * Purpose: get IP
    */
    public function enterIP()
    {
        $file = __DIR__ . '/../../../../.htaccess';
        $data = "Deny from " . $this->set . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);
        $add = new Yaurau_IP_Blocker_DB();
        $add->addIP = $this->set;
        $add->addIPDB();
    }
    /*
    * Function name: checkIP
    * Purpose: check IP
    */
    public function checkIP()
    {
        $check = new Yaurau_IP_Blocker_DB();
        $check->seachIPDB();
        $check->IP = $this->set;
        if($check->seachIPDB() == NULL){
            $add = $this;
            $add->set = $check->IP;
            $add->enterIP();
            return "IP $this->set blocked";
        }
        else {
            return "This IP address $this->set is already blocked";
        }
    }
    /*
    * Function name: handleIP
    * Purpose: handle IP
    */
    static public function handleIP()
    {
        if (!empty($_POST)) {
            $signon = wp_signon();
            if (is_wp_error($signon)) {
                if($_SERVER['REMOTE_ADDR']!= $_SERVER ['SERVER_ADDR']) {
                    if (Yaurau_IP_Blocker_DB::handleIPDB() == NULL) {
                        Yaurau_IP_Blocker_DB::setIPDB();
                    }
                    else {
                        Yaurau_IP_Blocker_Parser::parseQuery();
                    }
                }
            }
        }
    }
    /*
    * Function name: addDeny
    * Purpose: add deny
    */
    static public function addDeny()
    {
        $file = __DIR__ . '/../../../../.htaccess';
        $data = "Order Deny,Allow" . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);
    }
    /*
    * Function name: deleteDeny()
    * Purpose: delete Deny from IP
    */
    static public function deleteDeny()
    {
        $file = __DIR__ . '/../../../../.htaccess';
        $data = file_get_contents($file);
        $arrayIP = iterator_to_array(static::getIP());
        $replace = str_replace($arrayIP, '', $data);
        file_put_contents($file, $replace);
    }
    /*
    * Function name: deleteDeny()
    * Purpose: delete Order Deny,Allow
    */
    static public function deleteOrder()
    {
        $file = __DIR__ . '/../../../../.htaccess';
        $data = file_get_contents($file);
        $order = "Order Deny,Allow";
        $count = 1;
        $replace = str_replace($order, '', $data, $count);
        file_put_contents($file, $replace);
    }
    /*
    * Function name: getIP()
    * Purpose: get Deny from IP
    */
    static public function getIP()
    {
        $l = Yaurau_IP_Blocker_DB::loadIPDB();
        foreach ($l as $k) {
            foreach ($k as $d) {
                yield '' . 'Deny from ' . $d . '';
            }
        }
    }
    /*
    * Function name: seachOrder()
    * Purpose: seach string "Order Deny,Allow"
    */
    static public function seachOrder()
    {
        $file = __DIR__ . '/../../../../.htaccess';
        $data = file_get_contents($file);
        preg_match('/Order Deny,Allow/', $data, $matches);
        return $matches;
    }
    /*
    * Function name: redirectingBlockedIP
    * Purpose: redirecting blocked IP
    */
    static function redirectingBlockedIP()
    {
        if (Yaurau_IP_Blocker_DB::seachIPRepository() != NULL) {
            $timeCreate = Yaurau_IP_Blocker_DB::getTimeRepository()[0]->time;
            $time = time() - $timeCreate;
            if($time>86400){
                Yaurau_IP_Blocker_Repository::deleteIPbyRepository();
            }
            else{
                $url = Yaurau_IP_Blocker_View::getView();
                header('Location:' . esc_url($url));
            }
        }
    }
    /*
    * Function name: deleteIP
    * Purpose: unlocks with IP
    */
    static function deleteIP(){
        $id = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);
        $var = new Yaurau_IP_Blocker_DB();
        $var->id = $id;
        $IP = $var->getIPDbBlockedByPost()[0]->IP;
        $file = __DIR__ . '/../../../../.htaccess';
        $data = file_get_contents($file);
        $l = 'Deny from ' . $IP;
        $replace = str_replace($l,'', $data);
        file_put_contents($file, $replace);
        $var->deleteIPDbBlockedByPost();
        wp_die();
    }
}
