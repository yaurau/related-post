<?php
require_once __DIR__ . '/../autoload.php';

class Yaurau_Random_Quote_Widget extends WP_Widget
{
    public static function adminWidgetGet()
    {
        include_once __DIR__ . '/../public/admin_widget.php';
    }
}