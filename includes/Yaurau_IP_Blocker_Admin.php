<?php
/**
 *  @author   Rauvtovich Yauhen
 *  @copyright Y.Rauvtovich 2018
 *  @license   GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/../autoload.php';
class Yaurau_IP_Blocker_Admin
{
    /**
     * Function name: createMenu
     * Purpose: create menu
     */
    static public function createMenu()
     {
         add_options_page( 'IP Blocker', 'Yaurau IP Blocker', 'manage_options', 'yaurau_ip_blocker', [__CLASS__,'settings_page'] );
    }

    /**
     * Function name: my_register_settings
     */
    static public function my_register_settings()
    {
        register_setting( 'new_option', 'option' );
            add_settings_section(
                'eg_setting_section',
                'The maximum number of attempts to log in per day',
                '',
                Yaurau_IP_Blocker_PAGE
            );
            add_settings_field(
                'IP',
                'Enter the maximum number of attempts (at least 5)',
                'yib_msp_field',
                Yaurau_IP_Blocker_PAGE,
                'eg_setting_section'
            );
    }

    /**
     * Function name: settings_page
     */
    static public function  settings_page() {
        Yaurau_IP_Blocker_Widget::adminWidgetGet();
     }

    /**
     * Function name: getCreateMenu
     */
    static public function getCreateMenu() {
        add_action( 'admin_menu', [__CLASS__, 'createMenu']);
        add_action( 'admin_init', [__CLASS__,'my_register_settings'] );     }

    /**
     * Function name: getSettingsLink
     * @param $actions
     * @return mixed
     */
    static public function getSettingsLink($actions )
    {
        $actions['settings'] = '<a href="options-general.php?page=yaurau_ip_blocker">Settings</a>';
        return $actions;
    }
}

