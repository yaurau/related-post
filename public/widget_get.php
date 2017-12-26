<?php
require_once __DIR__ . '/../autoload.php';
function A() {
    global $wpdb;
    $sql = "SELECT `IP` FROM `wp_yaurau_ip_blocker`";
    $valueIP =$wpdb->get_results($sql, ARRAY_A);
    foreach ($valueIP as $key=>$value){
        foreach ($value as $v2) {
            yield $key+1 . $v2 . '<br>' ;
        }
    }
           };
$gen = A();
foreach ($gen as $val) {
    echo $val, PHP_EOL;
}
echo $gen->getReturn(), PHP_EOL;
$gen = Yaurau_IP_Blocker::getIPDB();
foreach ($gen as $val) {
    echo $val, PHP_EOL;
}
echo $gen->getReturn(), PHP_EOL;


?>
<script>
   //setTimeout('window.location.reload()', 1);
</script>
