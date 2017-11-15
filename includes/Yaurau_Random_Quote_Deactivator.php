<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Deactivator extends DB {
    /*
     * Function name: deactivate
     * Purpose: Deactivate the plugin
     */
	public static function deactivate() {
        $deactivate = new DB();
        $deactivate->dropDB();
	}

}
