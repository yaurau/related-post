<?php

require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Admin
{
    /*
    * Function name: createMenu
    * Purpose: create menu
    */
    static public function createMenu()
     {
         add_options_page( 'IP Blocker', 'Yaurau IP Blocker', 'manage_options', 'yaurau_ip_blocker', [__CLASS__,'settings_page'] );
    }
    static public function my_register_settings()
    {
        register_setting( 'new_option', 'option' );
            add_settings_section(
                'eg_setting_section',
                'The maximum number of hits per day',
                '',
                MY_PLAGIN_PAGE
            );
            add_settings_field(
                'IP',
                'Enter the maximum number of hits (at least 300)',
                'msp_field',
                MY_PLAGIN_PAGE,
                'eg_setting_section'
            );
    }
    static public function  settings_page() {
        Yaurau_Random_Quote_Widget::adminWidgetGet();
     }
    static public function getCreateMenu() {
        add_action( 'admin_menu', [__CLASS__, 'createMenu']);
        add_action( 'admin_init', [__CLASS__,'my_register_settings'] );     }
    static public function getSettingsLink( $actions )
    {
        $actions['settings'] = '<a href="options-general.php?page=yaurau_ip_blocker">Settings</a>';
        return $actions;
    }
}

