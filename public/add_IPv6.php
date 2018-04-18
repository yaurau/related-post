<form action=<?php echo '"options-general.php?page=' . Yaurau_IP_Blocker_PAGE .'"' ?> method="post">
    <label>Enter the IP</label>
    <input type="text" name="firstblockIPv6" maxlength="300" size="38">
    <input type="submit" value="Enter" name="submitIPv6">
</form>
</p>
<?
if(current_user_can(delete_plugins)) {
    $first = filter_var($_POST['firstblockIPv6'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    if (($first !== false)) {
        $l = new Yaurau_IP_Blocker();
        $l->set = $first;
        $l->enterIP();
        echo "IP $l->set blocked";
    } elseif ($_POST['submitIPv6']) {
        echo "Incorrect IP";
    }
}
?>
