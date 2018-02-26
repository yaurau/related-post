<?php
if ( ! defined( 'ABSPATH' ) ) exit;
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
        }
        if(DB::loadIPRepository() == NULL){
            DB::createDBIpRepository();
        }
        if(Yaurau_IP_Blocker::seachOrder() == NULL){
            Yaurau_IP_Blocker::addDeny();
        }

    }
}
