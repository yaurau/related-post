<?php
/**
 *  @author   Rauvtovich Yauhen
 *  @copyright Y.Rauvtovich 2018
 *  @license   GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) exit;
class Yaurau_IP_Blocker_View
{
    static function getCSS()
    {
        wp_enqueue_style('my-wp-admin', plugins_url('css/yib-admin.css', __FILE__));
    }
    static function includeAjax()
    {
        ?>
        <script>
            jQuery("body").on("click", "#responds .yibButton", function(e) {
                e.preventDefault();
                var clickedID = this.id.split("-");
                var DbNumberID = clickedID[1];
                jQuery.ajax({
                    type: "POST",
                    url: '<?php echo admin_url('admin-ajax.php')?>',
                    dataType:"text",
                    data: {
                        action: 'delete_ip_bloked',
                        recordToDelete: + DbNumberID
                    },
                    success:function(response){
                        jQuery('#item_'+DbNumberID).fadeOut("slow");
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                    }
                });
            });
        </script>
        <script>
            jQuery("body").on("click", "#respondsRepository .yibButton", function(e) {
                e.preventDefault();
                var clickedID = this.id.split("-");
                var DbNumberID = clickedID[1];
                jQuery.ajax({
                    type: "POST",
                    url: '<?php echo admin_url('admin-ajax.php')?>',
                    dataType:"text",
                    data: {
                        action: 'delete_ip_repository',
                        recordToDelete: + DbNumberID
                    },
                    success:function(response){
                        jQuery('#item_'+DbNumberID).fadeOut("slow");
                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        alert(thrownError);
                    }
                });
            });
        </script>
        <?php
    }
    static public function getView(){
        return plugins_url('banned.html',__FILE__);
    }
}