<?php
require_once __DIR__ . '/autoload.php';
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
$option_name = 'option';
delete_option($option_name);
DB::dropDBIpBlocked();
Yaurau_IP_Blocker::deleteDeny();


