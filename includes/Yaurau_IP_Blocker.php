<?php

class Yaurau_IP_Blocker
{
    public $set;

    /*
    * Function name: getIPDB
    * Purpose: get IP
    */
    static public function getIPDB()
    {
        $valueIP = DB::loadIPDB();
        foreach ($valueIP as $key => $value) {
            foreach ($value as $v2) {
                yield $v2;
            }
        }
    }
    /*
    * Function name: getIPRepository
    * Purpose: get IP fo repository
    */
    static public function getIPRepository()
    {
        $valueIP = DB::loadIPRepository();
        foreach ($valueIP as $key => $value) {
            foreach ($value as $v2) {
                yield $v2;
            }
        }
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
        $add = new DB();
        $add->addIP = $this->set;
        $add->addIPDB();
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
                //if($_SERVER['REMOTE_ADDR']!= $_SERVER ['SERVER_ADDR']) {
                if (DB::handleIPDB() == NULL) {
                    DB::setIPDB();
                } else {
                    Yaurau_IP_Blocker_Parser::parseQuery();
                }
                //}
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
        $l = DB::loadIPDB();
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
        if (DB::seachIPRepository() != NULL) {
            header('Location:' . plugins_url('yaurau-ip-blocker/public/banned.html'));
        }
    }
}
