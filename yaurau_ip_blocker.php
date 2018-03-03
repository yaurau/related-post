<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Plugin Name:       Yaurau IP Blocker
 * Plugin URI:        https://github.com/yaurau/yaurau-ip-blocker
 * Description:       The plugin blocks IP-addresses on the entered IP-address, and temporarily blocks IP-addresses when exceeding the limit of login and password and displays them in the table.
 * Version:           1.0.0
 * Author:            Rauvtovich Yauhen
 * Author URI:        https://github.com/yaurau
 * License:           GPL-2.0+
 */
require_once __DIR__ . '/autoload.php';
const Yaurau_IP_Blocker_PAGE = 'yaurau_ip_blocker';
register_activation_hook( __FILE__, ['Yaurau_IP_Blocker_Activator','activate']);
register_deactivation_hook( __FILE__, ['Yaurau_IP_Blocker_Deactivator','deactivate']);
Yaurau_IP_Blocker_Admin::getCreateMenu();
add_filter('plugin_action_links_' . plugin_basename(__FILE__), ['Yaurau_IP_Blocker_Admin', 'getSettingsLink'] );
add_action( 'plugins_loaded', ['Yaurau_IP_Blocker','handleIP']);
add_action( 'init', ['Yaurau_IP_Blocker','redirectingBlockedIP']);
add_action( 'admin_enqueue_scripts', ['Yaurau_IP_Blocker_CSS', 'getCSS'], 99 );
add_action('wp_ajax_delete_ip_bloked', ['Yaurau_IP_Blocker_DB','deleteIPDbBlocked']);
add_action('wp_ajax_delete_ip_repository', ['Yaurau_IP_Blocker_DB','deleteIPDbRepositoryByPost'], 99);


