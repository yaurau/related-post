<?php

class Yaurau_Random_Quote_Deactivator {
    private $db;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
    }

    public function DB() {
        $sql = "DROP TABLE wp_yaurau_random_quote";
        $this->db->query($sql);
    }
	public static function deactivate() {
        $deactivate = new Yaurau_Random_Quote_Deactivator();
        $deactivate->DB();
	}

}
