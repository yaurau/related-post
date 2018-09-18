<?php
/**
 *  @author   Rauvtovich Yauhen
 *  @copyright Y.Rauvtovich 2018
 *  @license   GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/../autoload.php';
class Yaurau_IP_Blocker_Deactivator extends Yaurau_IP_Blocker_DB
{
    /**
     * Function name: deactivate
     * Purpose: deactivate the plugin
     */
    public static function deactivate() {
        Yaurau_IP_Blocker_DB::dropDBIpBlocker();
    }
}
