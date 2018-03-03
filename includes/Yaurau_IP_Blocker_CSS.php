<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.03.2018
 * Time: 8:03
 */
class Yaurau_IP_Blocker_CSS
{
    static function CSS()
    {
        wp_enqueue_style('my-wp-admin', plugins_url().'/yaurau-ip-blocker/public/css/wp-admin.css');
    }

}