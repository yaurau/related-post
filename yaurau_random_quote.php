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
add_action( 'wp_enqueue_scripts', 'Yaurau_Random_Quote_Widget' );
function Yaurau_Random_Quote_Widget ()
{
    wp_enqueue_style( 'bootstrap', '/css/1.css');
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function theme_name_scripts()
{
    wp_enqueue_style( 'style-name', '/css/1.css' );
}
wp_add_inline_style ( 'bootstrap', '/css/1.css');

