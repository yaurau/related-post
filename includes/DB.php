<?php
require_once __DIR__ . '/../autoload.php';
class DB
{
    public $addIP;
    /*
    * Function name: createDB
    * Purpose: Create the database tables
    */
    static public function createDBIpBlocker()
    {
        global $wpdb;
        $sql =
            "CREATE TABLE wp_yaurau_ip_blocker (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),
			`number_views` int(255),
			`time` int(255),
            PRIMARY KEY(`id`));";
        $wpdb->query($sql);
    }
    static public function createDBIpBlocked()
    {
        global $wpdb;
        $sql =
            "CREATE TABLE wp_yaurau_ip_blocked (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),			
            PRIMARY KEY(`id`));";
        $wpdb->query($sql);}


    /*
    * Function name: dropDB
    * Purpose: Drop the database tables
    */
    static public function dropDBIpBlocker() {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_blocker;";
        $wpdb->query($sql);
    }
    static public function dropDBIpBlocked() {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_blocked;";
        $wpdb->query($sql);
    }
    public function deletIPDB()
    {
        global $wpdb;
        $sql = "DELETE FROM `wp_yaurau_ip_blocked` WHERE `IP` = '$this->addIP';";
        return $wpdb->query($sql);
    }
    /*
    * Function name: setIPDB
    * Purpose: Set the IP into the table
    */
    static public function setIPDB(){
        global $wpdb;
        $IP = base64_encode ($_SERVER ['REMOTE_ADDR']);
        $time = time();
        $sql = "INSERT INTO `wp_yaurau_ip_blocker`( `IP`, `number_views`, `time`) VALUES  ('$IP', '1','$time')";
        $wpdb->query($sql);
    }
    /*
    * Function name: addIPDB
    * Purpose: Add the IP into the table
    */
    public function addIPDB(){
        global $wpdb;
        $sql = "INSERT INTO `wp_yaurau_ip_blocked`( `IP` ) VALUES ('$this->addIP')";
        $wpdb->query($sql);
    }
    static public function handleIPDB()
    {
        global $wpdb;
        $IP = base64_encode($_SERVER ['REMOTE_ADDR']);
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '$IP'";
        return $wpdb->query($sql);
    }
    static public function counterViews()
    {   global $wpdb;
        $IP = base64_encode($_SERVER ['REMOTE_ADDR']);
        $sql = "SELECT `number_views` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '$IP'";
        $max = (get_option('option'));
        if(($wpdb->get_var($sql)) >= $max['input']){
            $l = new Yaurau_IP_Blocker();
            $l->set = $_SERVER ['REMOTE_ADDR'];
            $l->enterIP();
        }
        else {
            $views = $wpdb->get_var($sql) + 1;
            $sql = "UPDATE `wp_yaurau_ip_blocker` SET `number_views` = $views WHERE `IP`= '$IP'";
            $wpdb->query($sql);
        }

    }
    static public function loadIPDB(){
        global $wpdb;
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocked`";
        return $wpdb->get_results($sql, ARRAY_A);
    }
}
