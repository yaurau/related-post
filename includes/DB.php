<?php
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
        $sql = <<<EOT
            CREATE TABLE wp_yaurau_random_quote (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `quote` text,
			`author` varchar(255),
            PRIMARY KEY(`id`)); INSERT INTO `wp_yaurau_random_quote`( `quote`, `author`) VALUES              ('Великие начинания даже не надо обдумывать, надо взяться за дело, иначе, заметив трудность, отступишь', 'Гай Юлий Цезарь')
EOT;

        $this->db->query($sql);
    }
    /*
    * Function name: dropDB
    * Purpose: Drop the database tables
    */
    public function dropDB() {
        $sql = "DROP TABLE wp_yaurau_random_quote";
        $this->db->query($sql);
    }
}
/*; INSERT INTO `wp_yaurau_random_quote`( `quote`, `author`) VALUES              ('Великие начинания даже не надо обдумывать, надо взяться за дело, иначе, заметив                     трудность, отступишь', 'Гай Юлий Цезарь')
*/