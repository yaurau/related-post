<?php
if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/autoload.php';
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
$option_name = 'option';
delete_option($option_name);
Yaurau_IP_Blocker::deleteDeny();
Yaurau_IP_Blocker_DB::dropDBIpBlocked();
Yaurau_IP_Blocker_DB::dropDBIPRepository();
Yaurau_IP_Blocker::deleteOrder();


