<?php
/**
 *  @author   Rauvtovich Yauhen
 *  @copyright Y.Rauvtovich 2018
 *  @license   GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/../autoload.php';

class Yaurau_IP_Blocker_Widget extends WP_Widget
{
    /**
     * Function name: adminWidgetGet
     * Purpose: include file admin_widget.php
     */
    public static function adminWidgetGet()
    {
        include_once __DIR__ . '/../public/admin_widget.php';
    }

    /**
     * Function name: field
     */
    static public function field() {
        $val = get_option('option');
        $val = $val ? $val['input'] : null;
        ?> <input type="text" name="option[input]" value="<?php
        if(esc_attr( $val )<5){
            echo "";
        }
        else {
            echo esc_attr( $val );
        }
        ?>" /><?php
    }
}