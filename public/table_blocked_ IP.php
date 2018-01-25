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
            url:'action.php',
            columns:{
                identifier:[0, "id"],
                editable:[[1, 'IP']]
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