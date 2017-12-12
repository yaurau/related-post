<?php
require_once __DIR__ . '/../autoload.php';

class Yaurau_Random_Quote_Widget extends WP_Widget
{
    public static function widgetGet()
    {
        include_once __DIR__ . '/widget_get.php';
    }
    public static function adminWidgetGet()
    {
        include_once __DIR__ . '/admin_widget.php';
    }
    public static function addCSSJavaScript()
    {
       wp_enqueue_style( 'bootstrap', __DIR__ . '/css/1.css');
    }
}