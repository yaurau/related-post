<?php

interface IP_Blocker {
    //public function setIP();
    public function getIPDB();
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
    public function getIPDB(){

    }
    public function countEnterIP(){

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
