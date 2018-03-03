<form action=<?php echo '"options-general.php?page=' . Yaurau_IP_Blocker_PAGE .'"' ?> method="post">
<label>Enter the IP</label>
<input type="text" name="firstblockIP" >/
<input type="text" name="secondblockIP" maxlength="2" size="2">
<input type="submit" value="Enter" name="submit">
</form>
</p>
<?php
if(current_user_can(delete_plugins)) {
    $options = [
        'options' => ['min_range' => 0, 'max_range' => 32]
    ];
    $first = filter_var($_POST['firstblockIP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    $second = filter_var($_POST['secondblockIP'], FILTER_VALIDATE_INT, $options);
    if (($first !== false && $second !== false)) {
        $l = new Yaurau_IP_Blocker();
        $l->set = $first . '/' . $second;
        $l->enterIP();
        echo "IP $l->set blocked";
    } elseif ($first !== false && empty($second)) {
        $l = new Yaurau_IP_Blocker();
        $l->set = $first;
        $l->enterIP();
        echo "IP $l->set blocked";
    } elseif ($_POST['submit']) {
        echo "Incorrect IP";
    }
}
?>
