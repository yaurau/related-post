<?php
if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/../autoload.php';

class Yaurau_IP_Blocker_Widget extends WP_Widget
{
    /*
    * Function name: adminWidgetGet
    * Purpose: include file admin_widget.php
    */
    public static function adminWidgetGet()
    {
        include_once __DIR__ . '/../public/admin_widget.php';
    }
}