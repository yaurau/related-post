<?php if ( ! defined( 'ABSPATH' ) ) exit;?>
<?php
add_action('admin_print_footer_scripts', 'my_action_javascript', 99);
function my_action_javascript() {
?>
<script>
    jQuery("body").on("click", "#responds .myButton", function(e) {
        e.preventDefault();
        var clickedID = this.id.split("-");
        var DbNumberID = clickedID[1];
        jQuery.ajax({
            type: "POST",
            url: '<?php echo admin_url('admin-ajax.php')?>',
            dataType:"text",
            data: {
                action: 'myaction',
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
?>
<table id="responds" class="blueTable"">
    <thead>
    <tr>
        <th>#</th>
        <th>IP</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $gen = Yaurau_IP_Blocker::getIPDB();
    foreach ($gen as $key=>$row) {
        echo '<tr id="item_'.$row["id"].'">';
        echo '<td>'. ($key+1) .  '</td>';
        echo '<td>' . $row["IP"].'</td>';
        echo '<td class="del_wrapper"><button class="myButton" id="del-'.$row["id"].'">DELETE</button></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>



