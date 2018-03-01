<?php
require_once __DIR__ . '/../autoload.php';

global $wpdb;
$id = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);
//$sql = $wpdb->prepare("DELETE FROM wp_yaurau_ip_blocked WHERE id = %s", $IP);
$wpdb->query("DELETE FROM wp_yaurau_ip_blocked WHERE id = 4");
 /*

    $file = __DIR__ . '/../../../../.htaccess';
    $data = file_get_contents($file);
    $l = 'Deny from ' . $IP;
    $replace = str_replace($l,'', $data);
    file_put_contents($file, $replace);
//}
echo json_encode($input);*/
?>
