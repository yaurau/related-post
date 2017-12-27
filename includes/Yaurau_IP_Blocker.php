<?php

interface IP_Blocker {
    //public function setIP();
    //public function getIPDB();
    public function countEnterIP();
    //public function addIPDB ();
    //public function addIPHtaccess ();
    //public function handleIP ();
}


class Yaurau_IP_Blocker implements IP_Blocker
{
    public $set;
    static public function setIP(){
        $setIP = new DB;
        $setIP->setIPDB();
    }
    static public function getIPDB(){
        $valueIP=DB::loadIPDB();
        foreach ($valueIP as $key=>$value){
            foreach ($value as $v2) {
                yield $v2;
            }
        }
    }
    public function countEnterIP(){
        $file = __DIR__ .'/../../../../.htaccess';
        $data = '<br>'.'Order Allow,Deny' . '<br>' . 'Allow from' .  $this->set ;
        file_put_contents($file, $data, FILE_APPEND);
    }
    static public function addIPDB () {
        self::setIP();
    }
    static public function handleIP (){
        $setIP = new DB;
        //$this->set=
           // return $setIP->handleIPDB();
        if($setIP->handleIPDB() == NULL){
            return 'FALSE';
        }
        else {
            $count = new DB;
            $count->counterViews();
        }
    }
}
