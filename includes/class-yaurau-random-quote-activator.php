<?php
class Yaurau_Random_Quote_Activator {
    private $db;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
    }

    public function activate() {
        $sql = "CREATE TABLE wp_yaurau_random_quote (
            id INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY(`id`))";
        $this->db->query($sql);
	}
}
