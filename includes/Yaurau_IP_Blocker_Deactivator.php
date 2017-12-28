<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_IP_Blocker_Deactivator extends DB {
    /*
     * Function name: deactivate
     * Purpose: Deactivate the plugin
     */
	public static function deactivate() {
        DB::dropDBIpBlocked();
        DB::dropDBIpBlocker();
	}

}
