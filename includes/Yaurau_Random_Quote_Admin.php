<?php

require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Admin
{
     static public function createMenu()
     {
         add_options_page( 'IP Blocker', 'Yaurau IP Blocker', 'manage_options', 'yaurau_ip_blocker', [__CLASS__,'settings_page'] );
    }
    static public function my_register_settings()
    {
        register_setting( 'new_option', 'option' );
            add_settings_section(
                'eg_setting_section', // секция
                'The maximum number of hits per day',
                '',
                MY_PLAGIN_PAGE // страница
            );
            add_settings_field(
                'IP',
                'Enter the maximum number of hits',
                'msp_helloworld_authorbox_field',
                MY_PLAGIN_PAGE,
                'eg_setting_section'
            );
    }
    static public function  settings_page() {
        Yaurau_Random_Quote_Widget::adminWidgetGet();
     }
    static public function getCreateMenu() {
        add_action( 'admin_menu', [__CLASS__, 'createMenu']);
        add_action( 'admin_init', [__CLASS__,'my_register_settings'] );
        //add_action( 'admin_head', 'doll_css' );

    }
    static public function getSettingsLink( $actions )
    {
        $actions['settings'] = '<a href="options-general.php?page=yaurau_ip_blocker">Settings</a>';
        return $actions;
    }
}

