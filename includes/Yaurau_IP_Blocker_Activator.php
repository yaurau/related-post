<?php
/**
 *  @author   Rauvtovich Yauhen
 *  @copyright Y.Rauvtovich 2018
 *  @license   GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/../autoload.php';
class Yaurau_IP_Blocker_Activator extends Yaurau_IP_Blocker_DB
{
    /**
     * Function name: activate
     * Purpose: activate the plugin
     */
    static function activate() {
        Yaurau_IP_Blocker_DB::createDBIpBlocker();
        if(Yaurau_IP_Blocker_DB::loadIPDB() == NULL){
            Yaurau_IP_Blocker_DB::createDBIpBlocked();
        }
        if(Yaurau_IP_Blocker_DB::loadIPRepository() == NULL){
            Yaurau_IP_Blocker_DB::createDBIpRepository();
        }
        if(Yaurau_IP_Blocker::seachOrder() == NULL){
            Yaurau_IP_Blocker::addDeny();
        }
    }
}
