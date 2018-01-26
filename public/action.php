<?php
$connect = mysqli_connect('localhost', 'root', '', 'wordpress');

$input = filter_input_array(INPUT_POST);


$first_name = mysqli_real_escape_string($connect, $input["IP"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);


if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM wp_yaurau_ip_blocked 
 WHERE IP = '".$input["IP"]."'
 ";
    mysqli_query($connect, $query);
}

echo json_encode($input);

?>
