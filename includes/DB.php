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
            "CREATE TABLE wp_yaurau_random_quote (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `quote` text,
			`author` varchar(255),
            PRIMARY KEY(`id`))";

        $this->db->query($this->db->prepare($sql));
    }
    /*
    * Function name: dropDB
    * Purpose: Drop the database tables
    */
    public function dropDB() {
        $sql = "DROP TABLE wp_yaurau_random_quote";
        $this->db->query($this->db->prepare($sql));
    }

    public function createQuote(){
        $sql = "INSERT INTO `wp_yaurau_random_quote`( `quote`, `author`) VALUES              ('Великие начинания даже не надо обдумывать, надо взяться за дело, иначе, заметив                     трудность, отступишь', 'Гай Юлий Цезарь')";
        $this-> db->query($this->db->prepare($sql));
    }
    public function loadQuote(){
        //$sql = $this->db->prepare("SELECT `quote`, `author` FROM `wp_yaurau_random_quote` WHERE id=%d", 1);
        $sql = "SELECT * FROM `wp_yaurau_random_quote`";
        return $this->db->get_results($sql);
    }
}
