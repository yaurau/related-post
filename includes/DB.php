<?php
require_once __DIR__ . '/../autoload.php';
class DB
{
    private $db;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
    }
    /*
    * Function name: createDB
    * Purpose: Create the database tables
    */
    public function createDB()
    {
        $sql =
            "CREATE TABLE wp_yaurau_ip_blocker (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),
			`number_views` int(255),
			`time` int(255),
            PRIMARY KEY(`id`))";
        $this->db->query($sql);
    }
    /*
    * Function name: dropDB
    * Purpose: Drop the database tables
    */
    public function dropDB() {
        $sql = "DROP TABLE wp_yaurau_ip_blocker";
        $this->db->query($sql);
    }
    public function setIPDB(){
        $IP = $_SERVER ['REMOTE_ADDR'];
        $time = time();
        $sql = "INSERT INTO `wp_yaurau_ip_blocker`( `IP`, `number_views`, `time`) VALUES  ('$IP', '1','$time')";
        $this->db->query($sql);
    }

    public function handleIPDB()
    {
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '127.0.0.1'";
        return $this->db->query($sql);
    }

    public function loadQuote(){
        //$sql = $this->db->prepare("SELECT `quote`, `author` FROM `wp_yaurau_random_quote` WHERE id=%d", 1);
        //$sql = "SELECT * FROM `wp_yaurau_random_quote`";
      //  return $this->db->get_results($sql);
    }
}
