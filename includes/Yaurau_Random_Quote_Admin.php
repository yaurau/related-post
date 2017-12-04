<?php


class Yaurau_Random_Quote_Admin
{
    function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }
    function admin_menu() {
        add_options_page(
            'Page Title',
            'Circle Tree Login',
            'manage_options',
            'options_page_slug',
            array(
                $this,
                'settings_page'
            )
        );
    }
    function  settings_page() {
        echo 'This is the page content';
    }

}