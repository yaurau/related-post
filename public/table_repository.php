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
                $gen = Yaurau_IP_Blocker::getIPRepository();
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
            url: '<?php echo preg_replace('/public/', 'includes', plugin_dir_url(__FILE__). 'repository_action.php');?>',
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
