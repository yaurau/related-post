<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Activator extends DB {
    static function activate() {
        $activate = new DB();
        $activate->createDB();
	}
}
