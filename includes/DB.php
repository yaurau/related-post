<?php
require_once __DIR__ . '/../autoload.php';
class DB
{
    /*
    * Function name: createDB
    * Purpose: Create the database tables
    */
    static public function createDB()
    {
        global $wpdb;
        $sql =
            "CREATE TABLE wp_yaurau_ip_blocker (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),
			`number_views` int(255),
			`time` int(255),
            PRIMARY KEY(`id`))";
        $wpdb->query($sql);
    }
    /*
    * Function name: dropDB
    * Purpose: Drop the database tables
    */
    static public function dropDB() {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_blocker";
        $wpdb->query($sql);
    }
    static public function setIPDB(){
        global $wpdb;
        $IP = base64_encode ($_SERVER ['REMOTE_ADDR']);
        $time = time();
        $sql = "INSERT INTO `wp_yaurau_ip_blocker`( `IP`, `number_views`, `time`) VALUES  ('$IP', '1','$time')";
        $wpdb->query($sql);
    }

    static public function handleIPDB()
    {
        global $wpdb;
        $IP = base64_encode($_SERVER ['REMOTE_ADDR']).'\r\n';
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '$IP'";
        return $wpdb->query($sql);
    }
    static public function counterViews()
    {   global $wpdb;
        $IP = base64_encode($_SERVER ['REMOTE_ADDR']) . '\r\n';
        $sql = "SELECT `number_views` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '$IP'";
        $views =  $wpdb->get_var($sql) + 1;
        $sql = "UPDATE `wp_yaurau_ip_blocker` SET `number_views` = $views WHERE `IP`= '$IP'";
        $wpdb->query($sql);
    }
    static public function loadIPDB(){
        global $wpdb;
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocker`";
        return $wpdb->get_results($sql, ARRAY_A);
    }
}
