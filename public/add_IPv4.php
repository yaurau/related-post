<form action=<?php echo '"options-general.php?page=' . Yaurau_IP_Blocker_PAGE .'"' ?> method="post">
<label>Enter the IP</label>
    <input type="text" name="firstblockIPv4" >/
    <input type="text" name="secondblockIPv4" maxlength="2" size="2">
    <input type="submit" value="Enter" name="submitIPv4">
</form>
</p>
<?php
if(current_user_can(delete_plugins)) {
    $options = [
        'options' => ['min_range' => 0, 'max_range' => 32]
    ];
    $first = filter_var($_POST['firstblockIPv4'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    $second = filter_var($_POST['secondblockIPv4'], FILTER_VALIDATE_INT, $options);
    if (($first !== false && $second !== false)) {
        $IP = $first . '/' . $second;
        $l = new Yaurau_IP_Blocker();
        $l->set = $IP;
        echo $l->checkIP();
    } elseif ($first !== false && empty($second)) {
        $IP = $first;
        $l = new Yaurau_IP_Blocker();
        $l->set = $IP;
        echo $l->checkIP();
    } elseif ($_POST['submitIPv4']) {
        echo "Incorrect IP";
    }
}
?>
