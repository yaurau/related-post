<?php

/**
 * Plugin Name:       Yaurau Random Quote
 * Plugin URI:        https://github.com/yaurau/yaurau-random-quote
 * Description:       A plugin for output random quote.
 * Version:           1.0.0
 * Author:            Rauvtovich Yauhen
 * Author URI:        https://github.com/yaurau
 * License:           GPL-2.0+
 */
require_once __DIR__ . '/autoload.php';


register_activation_hook( __FILE__, ['Yaurau_Random_Quote_Activator','activate']);
register_deactivation_hook( __FILE__, ['Yaurau_Random_Quote_Deactivator','deactivate']);
add_action( 'basic_after_single_content', ['Yaurau_Random_Quote_Widget', 'widgetGet'] );
 Yaurau_Random_Quote_Admin::getCreateMenu();
add_filter('plugin_action_links', ['Yaurau_Random_Quote_Admin', 'getSettingsLink']);