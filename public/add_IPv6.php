<form action=<?php echo '"options-general.php?page=' . Yaurau_IP_Blocker_PAGE .'"' ?> method="post">
    <label>Enter the IP</label>
    <input type="text" name="firstblockIP" maxlength="300" size="38">
    <input type="submit" value="Enter" name="submit">
</form>
</p>
<?
if(current_user_can(delete_plugins)) {
    $first = filter_var($_POST['firstblockIP'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    if (($first !== false)) {
        $l = new Yaurau_IP_Blocker();
        $l->set = $first;
        $l->enterIP();
        echo "IP $l->set blocked";
    } elseif ($_POST['submit']) {
        echo "Incorrect IP";
    }
}
?>
