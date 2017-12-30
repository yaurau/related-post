<?php

interface IP_Blocker {
    //public function setIP();
    //public function getIPDB();
    public function enterIP();
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
    public function enterIP(){
        $file = __DIR__ .'/../../../../.htaccess';
        $data = "Deny from ". $this->set . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);
        $add = new DB();
        $add->addIP = $this->set;
        $add->addIPDB();

    }
    static public function addIPDB () {
        self::setIP();
    }
    static public function handleIP (){
        $setIP = new DB;
        //$this->set=
           // return $setIP->handleIPDB();
        if($setIP->handleIPDB() == NULL){
            DB::setIPDB();
        }
        else {
            DB::counterViews();
        }
    }
    static public function addDeny(){
        $file = __DIR__ .'/../../../../.htaccess';
        $data = "Order Deny,Allow" . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);
    }
    static public function deleteIPBlocked(){
        $file = __DIR__ .'/../../../../.htaccess';
        $data = file_get_contents($file);
        preg_replace('/Deny from f.f.w.w/','', $data);
    }
}
