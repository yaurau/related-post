<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_IP_Blocker_Activator extends DB {
    /*
    * Function name: activate
    * Purpose: activate the plugin
    */
    static function activate() {
        DB::createDBIpBlocker();
        if(DB::loadIPDB() == NULL){
            DB::createDBIpBlocked();
            Yaurau_IP_Blocker::addDeny();
        }
    }
}
