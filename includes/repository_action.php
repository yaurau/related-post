<?php
if ( ! defined( 'ABSPATH' ) ) exit;
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../../../../wp-config.php';
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$input = filter_input_array(INPUT_POST);
$IP = mysqli_real_escape_string($connect, $input["IP"]);
if($input["action"] === 'delete')
{
    $query = "
 DELETE FROM wp_yaurau_ip_repository 
 WHERE IP = '".$IP."'
 ";
    mysqli_query($connect, $query);
    $file = __DIR__ . '/../../../../.htaccess';
    $data = file_get_contents($file);
    $l = 'Deny from ' . $IP;
    $replace = str_replace($l,'', $data);
    file_put_contents($file, $replace);
}
echo json_encode($input);
?>
