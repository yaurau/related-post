<?php

class Yaurau_Random_Quote_Admin
{

    static public function createMenu()
    {
        add_options_page('IP Blocker', 'Yaurau IP Blocker', 'manage_options', 'post.php', [__CLASS__, 'settings_page']);

    }

    static public function my_register_settings()
    {
        register_setting(
            'option',
            'some_other_option'
        );
        add_settings_section(
            'eg_setting_section', // секция
            'Заголовок для секции настроек',
            '',
            MY_PLAGIN_PAGE // страница
        );
        add_settings_field(
            'IP',
            'Введите IP',
            'msp_helloworld_authorbox_field',
            MY_PLAGIN_PAGE,
            'eg_setting_section'
        );
        add_settings_field(
            'IP-2',
            'Введите Host',
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
    }
    static public function getSettingsLink( $actions, $plugin_file = MY_PLAGIN_PAGE )
    {
        if( false === strpos( $plugin_file, basename(__FILE__) ) )
            return $actions;
        $settings_link = '<a href="options-general.php?page=post.php">Settings</a>';
        array_unshift( $actions, $settings_link );
        return $actions;
    }
}


