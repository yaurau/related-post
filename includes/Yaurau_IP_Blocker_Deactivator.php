<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_IP_Blocker_Deactivator extends DB {
    /*
     * Function name: deactivate
     * Purpose: deactivate the plugin
     */
	public static function deactivate() {
        DB::dropDBIpBlocker();
    }
}
