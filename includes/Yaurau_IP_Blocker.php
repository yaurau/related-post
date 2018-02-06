<?php

class Yaurau_IP_Blocker
{
    public $set;
    //public $setIP;
    /*

    static public function setIP(){
        $setIP = new DB;
        $setIP->setIPDB();
    }
    */
    /*
    * Function name: getIPDB
    * Purpose: get IP
    */
    static public function getIPDB(){
        $valueIP=DB::loadIPDB();
        foreach ($valueIP as $key=>$value){
            foreach ($value as $v2) {
                yield $v2;
            }
        }
    }
    /*
    * Function name: enterIP
    * Purpose: get IP
    */
    public function enterIP(){
        $file = __DIR__ .'/../../../../.htaccess';
        $data = "Deny from ". $this->set . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);
        $add = new DB();
        $add->addIP = $this->set;
        $add->addIPDB();
    }
 /*
    static public function addIPDB () {
        self::setIP();
    }
    */
    /*
    * Function name: handleIP
    * Purpose: handle IP
    */
    static public function handleIP (){
        $setIP = new DB;
        if($setIP->handleIPDB() == NULL){
            DB::setIPDB();
        }
        else {
            Yaurau_IP_Blocker_Parser::parseQuery();
        }
    }
    /*
    * Function name: addDeny
    * Purpose: add deny
    */
    static public function addDeny(){
        $file = __DIR__ .'/../../../../.htaccess';
        $data = "Order Deny,Allow" . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);
    }
    static public function deleteDeny()
    {

        $file = __DIR__ . '/../../../../.htaccess';
        $data = file_get_contents($file);
        $arrayIP = iterator_to_array(self::getIP());
        $deny = implode(', ',$arrayIP);
        $order = "Order Deny,Allow";
        $search = [$deny, $order];
        $replace = str_replace($search, '', $data);
        file_put_contents($file, $replace);
    }
    static public function getIP()
    {
        $l = DB::loadIPDB();
        foreach ($l as $k) {
            foreach ($k as $d) {
                yield 'Deny from ' . $d;
            }
        }
    }
}
