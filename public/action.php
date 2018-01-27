<?php
require_once __DIR__ . '/../../../../wp-config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$input = filter_input_array(INPUT_POST);
$IP = mysqli_real_escape_string($connect, $input["IP"]);
if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM wp_yaurau_ip_blocked 
 WHERE IP = '".$IP."'
 ";
    mysqli_query($connect, $query);
}
echo json_encode($input);
?>
