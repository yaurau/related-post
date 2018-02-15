<?php
require_once __DIR__ . '/../autoload.php';
class DB
{
    public $addIP;
    /*
    * Function name: createDBIpBlocker
    * Purpose: create the database table wp_yaurau_ip_blocker
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
    /*
    * Function name: createDBIpRepository
    * Purpose: create the database table wp_yaurau_ip_repository
    */
    static public function createDBIpRepository()
    {
        global $wpdb;
        $sql =
            "CREATE TABLE wp_yaurau_ip_repository (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),			
			`time` int(255),
            PRIMARY KEY(`id`));";
        $wpdb->query($sql);
    }
    /*
    * Function name: setIPDBRepository
    * Purpose: set the IP into the table wp_yaurau_ip_repository
    */
    static public function setIPDBRepository(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $time = $_SERVER['REQUEST_TIME'];
        $sql = "INSERT INTO `wp_yaurau_ip_repository`( `IP`, `time`) VALUES  ('$IP', '$time')";
        $wpdb->query($sql);
    }
    /*
    * Function name: loadIPRepository
    * Purpose: load IP of wp_yaurau_ip_repository
    */
    static public function loadIPRepository(){
        global $wpdb;
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_repository`";
        return $wpdb->get_results($sql, ARRAY_A);
    }
    /*
    * Function name: dropDBIPRepository
    * Purpose: drop the database tables wp_yaurau_ip_repository
    */
    static public function dropDBIPRepository() {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_repository;";
        $wpdb->query($sql);
    }
    /*
    * Function name: handleIPDB
    * Purpose: check the corresponding field
    */
    static public function handleIPRepository()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_repository` WHERE `IP`= '$IP'";
        return $wpdb->query($sql);
    }
    static public function getTimeRepository(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "SELECT `time` FROM `wp_yaurau_ip_repository` WHERE   `IP`= '$IP'";
        return $wpdb->get_results($sql, OBJECT);
    }
    /*
     * Function name: deleteIPDB
    * Purpose: delete IP in the table wp_yaurau_ip_blocker
    */
    static public function deleteIPDBRepository(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "DELETE FROM wp_yaurau_ip_repository WHERE IP = '$IP'";
        $wpdb->query($sql);
    }
    /*
    * Function name: createDBIpBlocked
    * Purpose: create the database table wp_yaurau_ip_blocked
    */
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
    * Function name: dropDBIpBlocker
    * Purpose: drop the database tables wp_yaurau_ip_blocker
    */
    static public function dropDBIpBlocker() {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_blocker;";
        $wpdb->query($sql);
    }
    /*
    * Function name: dropDBIpBlocked
    * Purpose: drop the database tables wp_yaurau_ip_blocked
    */
    static public function dropDBIpBlocked() {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_blocked;";
        $wpdb->query($sql);
    }
    /*
    * Function name: setIPDB
    * Purpose: set the IP into the table wp_yaurau_ip_blocker
    */
    static public function setIPDB(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $time = $_SERVER['REQUEST_TIME'];
        $sql = "INSERT INTO `wp_yaurau_ip_blocker`( `IP`, `number_views`,`time`) VALUES  ('$IP', '1', '$time')";
        $wpdb->query($sql);
    }
    /*
    * Function name: addIPDB
    * Purpose: add the IP into the table wp_yaurau_ip_blocked
    */
    public function addIPDB(){
        global $wpdb;
        $sql = "INSERT INTO `wp_yaurau_ip_blocked`( `IP` ) VALUES ('$this->addIP')";
        $wpdb->query($sql);
    }
    /*
    * Function name: handleIPDB
    * Purpose: check the corresponding field
    */
    static public function handleIPDB()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '$IP'";
        return $wpdb->query($sql);
    }
    /*
    * Function name: counterViews
    * Purpose: the counter views
    */
    static public function counterViews()
    {   global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "SELECT `number_views` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '$IP'";
            $views = $wpdb->get_var($sql) + 1;
            $sql = "UPDATE `wp_yaurau_ip_blocker` SET `number_views` = $views WHERE `IP`= '$IP'";
            $wpdb->query($sql);
    }
    /*
    * Function name: loadIPDB
    * Purpose: load IP
    */
    static public function loadIPDB(){
        global $wpdb;
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocked`";
        return $wpdb->get_results($sql, ARRAY_A);
    }
    /*
    * Function name: getTime
    * Purpose: get time
    */
    static public function getTime(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "SELECT `time` FROM `wp_yaurau_ip_blocker` WHERE   `IP`= '$IP'";
        return $wpdb->get_results($sql, OBJECT);
    }
    /*
    * Function name: deleteIPDB
    * Purpose: delete IP in the table wp_yaurau_ip_blocker
    */
    static public function deleteIPDB(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "DELETE FROM wp_yaurau_ip_blocker WHERE IP = '$IP'";
        $wpdb->query($sql);
    }
    /*
    * Function name: getViews
    * Purpose: get views
    */
    static public function getViews(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = "SELECT `number_views` FROM `wp_yaurau_ip_blocker` WHERE `IP`= '$IP'";
        return $wpdb->get_results($sql, OBJECT);
    }
    /*
    * Function name: updateData
    * Purpose: update data
    */
    static public function updateData(){
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $time = time();
        $views = 1;
        $sql = "UPDATE `wp_yaurau_ip_blocker` SET `number_views` = $views, `time`= $time WHERE `IP`= '$IP'";
        $wpdb->query($sql);
    }
}
