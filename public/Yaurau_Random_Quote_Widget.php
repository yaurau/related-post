<?php
require_once __DIR__ . '/../autoload.php';
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.11.2017
 * Time: 22:45
 */
class Yaurau_Random_Quote_Widget extends WP_Widget
{
    public static function widgetGet()
    {
        echo '<p>' . Yaurau_Random_Quote_Loader::getQuote(). "</p>". "<br><p align='right'>" . Yaurau_Random_Quote_Loader::getAuthor() . '</p>';
    }

}