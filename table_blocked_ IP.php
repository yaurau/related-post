<?php if ( ! defined( 'ABSPATH' ) ) exit;?>
<div class="container-fluid"" >
    <div class="table-responsive">
        <table id="editable_table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $gen = Yaurau_IP_Blocker::getIPDB();
                foreach ($gen as $key=>$val) {
                    echo '
                    <tr>
                        <td>'. ($key+1) .  '</td>  
                        <td>'. $val .'</td>       
                     </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        jQuery('#editable_table').Tabledit({
            url: '<?php echo preg_replace('/public/', 'includes', plugin_dir_url(__FILE__). 'table_action.php');?>',
            rowIdentifier: 'data-id',
            editButton: false,
            restoreButton: false,
            buttons: {
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: '<span class="glyphicon glyphicon-trash"></span> &nbsp DELETE',
                    action: 'delete'
                },
                confirm: {
                    class: 'btn btn-sm btn-default',
                    html: 'Are you sure?'
                }
            },
            columns:{
                identifier:[1, 'IP'],
                editable:[[0, '#']]
            },
            restoreButton:false,
            editButton: false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#'+data.id).remove();
                }
            }
        });
    });
</script>
<style>
    a.del_button {
        display: inline-block;
        font-size: 12px;
        color: rgb(205,216,228);
        text-decoration: none;
        padding: .2em .8em;
        outline: none;
        border-right: 1px solid rgba(13,20,27,.5);
        border-top: 1px solid rgba(270,278,287,.01);
        background-color: rgb(64,73,82);
        background-image:
                radial-gradient(1px 60% at 0% 50%, rgba(255,255,255,.3), transparent),
                radial-gradient(1px 60% at 100% 50%, rgba(255,255,255,.3), transparent),
                linear-gradient(rgb(64,73,82), rgb(72,81,90));
    }
    a.del_button:hover {
        background-image:
                radial-gradient(1px 60% at 0% 50%, rgba(255,255,255,.3), transparent),
                radial-gradient(1px 60% at 100% 50%, rgba(255,255,255,.3), transparent),
                linear-gradient(rgb(51,60,67), rgb(58,65,72));
    }
    a.del_button:focus {
        color: rgb(245,247,250);
        border-top: 1px solid rgb(67,111,136);
        background-image:
                linear-gradient(rgb(46,95,122), rgb(36,68,92));
    }
    a.del_button:focus:hover {
        border-top: 1px solid rgb(49,87,107);
        background-image:
                linear-gradient(rgb(33,77,98), rgb(29,57,77));
    }
</style>
<?php
add_action('admin_print_footer_scripts', 'my_action_javascript', 99);
function my_action_javascript() {
?>
<script>
    jQuery("body").on("click", "#responds .del_button", function(e) {
        e.preventDefault();
        var clickedID = this.id.split("-"); //Разбиваем строку (Split работает аналогично PHP explode)
        var DbNumberID = clickedID[1]; //и получаем номер из массива
        jQuery.ajax({
            type: "POST", // HTTP метод  POST
            url: '<?php echo admin_url('admin-ajax.php')?>', //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных
            data: {
                action: 'myaction',
                recordToDelete: + DbNumberID
            },  //post переменные
            success:function(response){
// в случае успеха, скрываем, выбранный пользователем для удаления, элемент
                jQuery('#item_'+DbNumberID).fadeOut("slow");
            },
            error:function (xhr, ajaxOptions, thrownError){
//выводим ошибку
                alert(thrownError);
            }
        });
    });

</script>
    <script>
        console.log( myData);
    </script>
    <?php
}
?>
<div class="content_wrapper">
<table id="responds" class="table table-bordered table-striped">

    <?php
    $gen = Yaurau_IP_Blocker::getIPDB();
    foreach ($gen as $row) {
        echo '<tr id="item_'.$row["id"].'">';
        echo '<td>' . $row["IP"].'</td>';
        echo '<td class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">DELETE</a></td>';
        echo '</tr>';
    }
    ?>

</table>
</div>


