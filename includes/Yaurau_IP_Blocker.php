<?php

interface IP_Blocker {
    public function setIPDB();
    public function getIPDB();
    public function countEnterIP();
    //public function addIPDB ();
    //public function addIPHtaccess ();
}


class Yaurau_IP_Blocker implements IP_Blocker
{
    public function setIPDB(){

    }
    public function getIPDB(){

    }
    public function countEnterIP(){

    }
    public function addIPDB () {
        $_SERVER ['REMOTE_ADDR'];
    }

}