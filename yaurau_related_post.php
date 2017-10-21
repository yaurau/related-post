<?php

/**

 * Plugin Name:       Yaurau Related Post
 * Plugin URI:        https://github.com/yaurau/related-post
 * Description:       A plugin for output related post.
 * Version:           1.0.0
 * Author:            Rauvtovich Yauhen
 * Author URI:        https://github.com/yaurau
 * License:           GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yaurau-related-post-activator.php
 */
function activate_yaurau_related_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yaurau-related-post-activator.php';
	Related_Post_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yaurau-related-post-deactivator.php
 */
function deactivate_yaurau_related_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yaurau-related-post-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yaurau_related_post' );
register_deactivation_hook( __FILE__, 'deactivate_yaurau_related_post' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-yaurau-related-post.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Plugin_Name();
	$plugin->run();

}
run_plugin_name();
