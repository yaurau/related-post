<?php
/**
 *  @author   Rauvtovich Yauhen
 *   @copyright Y.Rauvtovich 2018
 *   @license   GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/../autoload.php';
class Yaurau_IP_Blocker_DB
{
    /**
     * @var
     */
    public $addIP;
    /**
     * @var
     */
    public $IP;
    /**
     * @var
     */
    public $id;

    /**
     * Function name: createDBIpBlocker
     * Purpose: create the database table wp_yaurau_ip_blocker
     */
    static public function createDBIpBlocker()
    {
        global $wpdb;
        $sql = "CREATE TABLE wp_yaurau_ip_blocker (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),
			`number_views` int(255),
			`time` int(255),
            PRIMARY KEY(`id`))";
        $wpdb->query($sql);
    }

    /**
     * Function name: createDBIpRepository
     * Purpose: create the database table wp_yaurau_ip_repository
     */
    static public function createDBIpRepository()
    {
        global $wpdb;
        $sql = "CREATE TABLE wp_yaurau_ip_repository (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),			
			`time` int(255),
            PRIMARY KEY(`id`))";
        $wpdb->query($sql);
    }

    /**
     * Function name: setIPDBRepository
     * Purpose: set the IP into the table wp_yaurau_ip_repository
     */
    static public function setIPDBRepository()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $time = $_SERVER['REQUEST_TIME'];
        $sql = $wpdb->prepare("INSERT INTO `wp_yaurau_ip_repository`( `IP`, `time`) VALUES  (%s, %s)", $IP, $time);
        $wpdb->query($sql);
    }

    /**
     * Function name: loadIPRepository
     * Purpose: load IP of wp_yaurau_ip_repository
     * @return array|null|object
     */
    static public function loadIPRepository()
    {
        global $wpdb;
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_repository`";
        return $wpdb->get_results($sql, ARRAY_A);
    }

    /**
     * Function name: loadidIPRepository
     * Purpose: load id and IP of wp_yaurau_ip_repository
     * @return array|null|object
     */
    static public function loadidIPRepository()
    {
        global $wpdb;
        $sql = "SELECT `id`,`IP` FROM `wp_yaurau_ip_repository`";
        return $wpdb->get_results($sql, ARRAY_A);
    }

    /**
     * Function name: loadIPRepository
     * Purpose: load IP of wp_yaurau_ip_repository
     * @return false|int
     */
    static public function seachIPRepository()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("SELECT `IP` FROM `wp_yaurau_ip_repository`WHERE IP = %s", $IP);
        return $wpdb->query($sql);
    }

    /**
     * Function name: getTimeRepository
     * Purpose: get time of wp_yaurau_ip_repository
     * @return array|null|object
     */
    static public function getTimeRepository()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("SELECT `time` FROM `wp_yaurau_ip_repository` WHERE   `IP`= %s", $IP);
        return $wpdb->get_results($sql, OBJECT);
    }

    /**
     * Function name: dropDBIPRepository
     * Purpose: drop the database tables wp_yaurau_ip_repository
     */
    static public function dropDBIPRepository()
    {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_repository";
        $wpdb->query($sql);
    }

    /**
     * Function name: handleIPDB
     * Purpose: check the corresponding field
     * @return false|int
     */
    static public function handleIPRepository()
    {
        global $wpdb;
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_repository`";
        return $wpdb->query($sql);
    }

    /**
     * Function name: deleteIPDB
     * Purpose: delete IP in the table wp_yaurau_ip_blocker
     */
    static public function deleteIPDBRepository()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("DELETE FROM wp_yaurau_ip_repository WHERE IP= %s", $IP);
        $wpdb->query($sql);
    }

    /**
     * Function name: deleteIPDbBlocked
     * Purpose: get POST and delete IP in the table wp_yaurau_ip_repository
     */
    static public function deleteIPDbRepositoryByPost()
    {
        global $wpdb;
        $id = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);
        $sql = $wpdb->prepare("DELETE FROM wp_yaurau_ip_repository WHERE id = %s", $id);
        $wpdb->query($sql);
        wp_die();
    }

    /**
     * Function name: createDBIpBlocked
     * Purpose: create the database table wp_yaurau_ip_blocked
     */
    static public function createDBIpBlocked()
    {
        global $wpdb;
        $sql = "CREATE TABLE wp_yaurau_ip_blocked (
            id INT(11) NOT NULL AUTO_INCREMENT,
            `IP` text(50),			
            PRIMARY KEY(`id`))";
        $wpdb->query($sql);
    }

    /**
     * Function name: dropDBIpBlocker
     * Purpose: drop the database tables wp_yaurau_ip_blocker
     */
    static public function dropDBIpBlocker()
    {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_blocker";
        $wpdb->query($sql);
    }

    /**
     * Function name: dropDBIpBlocked
     * Purpose: drop the database tables wp_yaurau_ip_blocked
     */
    static public function dropDBIpBlocked()
    {
        global $wpdb;
        $sql = "DROP TABLE wp_yaurau_ip_blocked";
        $wpdb->query($sql);
    }

    /**
     * Function name: setIPDB
     * Purpose: set the IP into the table wp_yaurau_ip_blocker
     */
    static public function setIPDB()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $time = $_SERVER['REQUEST_TIME'];
        $sql = $wpdb->prepare("INSERT INTO `wp_yaurau_ip_blocker`( `IP`, `number_views`,`time`) VALUES  (%s, %d, %s)", $IP, 1, $time);
        $wpdb->query($sql);
    }

    /**
     * Function name: addIPDB
     * Purpose: add the IP into the table wp_yaurau_ip_blocked
     */
    public function addIPDB()
    {
        global $wpdb;
        $sql = $wpdb->prepare("INSERT INTO `wp_yaurau_ip_blocked`( `IP` ) VALUES ('%s')", $this->addIP);
        $wpdb->query($sql);
    }


    /**
     * Function name: handleIPDB
     * Purpose: check the corresponding field
     * @return false|int
     */
    static public function handleIPDB()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("SELECT `IP` FROM `wp_yaurau_ip_blocker` WHERE `IP`= %s", $IP);
        return $wpdb->query($sql);
    }

    /**
     * Function name: seachIPDB
     * Purpose: seach IP search in BD
     * @return false|int
     */
    public function seachIPDB()
    {
        global $wpdb;
        $sql = $wpdb->prepare("SELECT `IP` FROM `wp_yaurau_ip_blocked` WHERE `IP`= %s", $this->IP);
        return $wpdb->query($sql);
    }

    /**
     * Function name: counterViews
     * Purpose: the counter views
     */
    static public function counterViews()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("SELECT `number_views` FROM `wp_yaurau_ip_blocker` WHERE `IP`= %s", $IP);
        $views = $wpdb->get_var($sql) + 1;
        $sql = $wpdb->prepare("UPDATE `wp_yaurau_ip_blocker` SET `number_views` = $views WHERE `IP`= %s", $IP);
        $wpdb->query($sql);
    }

    /**
     * Function name: loadIPDB
     * Purpose: load IP
     * @return array|null|object
     */
    static public function loadIPDB()
    {
        global $wpdb;
        $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocked`";
        return $wpdb->get_results($sql, ARRAY_A);
    }

    /**
     * Function name: loadidIPDB
     * Purpose: load id and IP
     * @return array|null|object
     */
    static public function loadidIPDB()
    {
        global $wpdb;
        $sql = "SELECT `id`,`IP` FROM `wp_yaurau_ip_blocked`";
        return $wpdb->get_results($sql, ARRAY_A);
    }

    /**
     * Function name: getTime
     * Purpose: get time
     * @return array|null|object
     */
    static public function getTime()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("SELECT `time` FROM `wp_yaurau_ip_blocker` WHERE   `IP`= %s", $IP);
        return $wpdb->get_results($sql, OBJECT);
    }

    /**
     * Function name: deleteIPDB
     * Purpose: delete IP in the table wp_yaurau_ip_blocker
     */
    static public function deleteIPDB()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("DELETE FROM wp_yaurau_ip_blocker WHERE `IP`= %s", $IP);
        $wpdb->query($sql);
    }

    /**
     * Function name: deleteIPDbBlockedByPost
     * Purpose: delete IP in the table wp_yaurau_ip_blocked
     */
    public function deleteIPDbBlockedByPost()
    {
        global $wpdb;
        $sql = $wpdb->prepare("DELETE FROM wp_yaurau_ip_blocked WHERE id = %s", $this->id);
        $wpdb->query($sql);
    }

    /**
     * Function name: getIPDbBlockedByPost
     * Purpose: get POST IP in the table wp_yaurau_ip_blocked
     * @return array|null|object
     */
    public function getIPDbBlockedByPost()
    {
        global $wpdb;
        $sql = $wpdb->prepare("SELECT `IP` FROM wp_yaurau_ip_blocked WHERE id = %s", $this->id);
        return $wpdb->get_results($sql, OBJECT);
    }

    /**
     * Function name: getViews
     * Purpose: get views
     * @return array|null|object
     */
    static public function getViews()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $sql = $wpdb->prepare("SELECT `number_views` FROM `wp_yaurau_ip_blocker` WHERE `IP`= %s", $IP);
        return $wpdb->get_results($sql, OBJECT);
    }

    /**
     * Function name: updateData
     * Purpose: update data
     */
    static public function updateData()
    {
        global $wpdb;
        $IP = $_SERVER ['REMOTE_ADDR'];
        $time = time();
        $views = 1;
        $sql = $wpdb->prepare("UPDATE `wp_yaurau_ip_blocker` SET `number_views` = %d, `time`= %d WHERE `IP`= %s", $views, $time, $IP);
        $wpdb->query($sql);
    }
}
