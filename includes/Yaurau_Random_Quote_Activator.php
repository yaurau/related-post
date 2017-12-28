<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Activator extends DB {
    /*
    * Function name: activate
    * Purpose: Activate the plugin
     */

    static function activate() {
        DB::createDB();
        DB::setIPDB();

	}
}
