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


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Yaurau_Random_Quote_Activator.php
 */
require_once __DIR__ . '/autoload.php';
function activate_yaurau_random_quote() {
    Yaurau_Random_Quote_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yaurau-random-quote-deactivator.php
 */
function deactivate_yaurau_random_quote() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yaurau-random-quote-deactivator.php';
	Yaurau_Random_Quote_Deactivator::deactivate();
}

register_activation_hook( __FILE__, ['Yaurau_Random_Quote_Activator','activate']);
register_deactivation_hook( __FILE__, 'deactivate_yaurau_random_quote' );

