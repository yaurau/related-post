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
        return $setIP->handleIPDB();
        /*if(self::handleIP()){
            return 'FALSE';
        }
        else {
            return 'Ok';
        }*/
    }
}
