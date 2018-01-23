<div class="container">
    <br />
    <br />
    <br />
    <div class="table-responsive">
        <table id="editable_table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>IP</th>
                <th>Test</th>
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
       <td>'. 3 .'</td>
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
            url:'actio.php',
            columns:{
                identifier:[0, "id"],
                editable:[[1, 'first_name'], [2, 'last_name']]
            },
            restoreButton:false,
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