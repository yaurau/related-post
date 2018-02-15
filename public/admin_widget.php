<?php
echo "<link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
";
echo "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>";
$path = plugin_dir_url(__FILE__) . 'js/jquery.tabledit.min.js';
echo "<script src=\"$path\"></script>";
?>
<?php
var_dump(DB::handleIPRepository());
?>
<div class="wrap">
    <h2><?php echo get_admin_page_title() ?></h2>
    <p><h3>Add IPv4</h3>
    <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post">
        <label>Enter the IP</label>
        <input type="text" name="firstblockIP" maxlength="3" size="2">.
        <input type="text" name="secondblockIP" maxlength="3" size="2">.
        <input type="text" name="thirdblockIP" maxlength="3" size="2">.
        <input type="text" name="fourthblockIP" maxlength="3" size="2">
        <input type="submit" value="Enter" name="submit">
    </form>
    </p>
    <?php
    $first = $_POST['firstblockIP'];
    $second = $_POST['secondblockIP'];
    $third = $_POST['thirdblockIP'];
    $forth = $_POST['fourthblockIP'];
    if(isset($first) && isset($second)&& isset($third)&& isset($forth)&& is_numeric($first) && is_numeric($second) && is_numeric($third) && is_numeric($forth) && ($first<=255) && ($first>=0)&& ($second<=255) && ($second>=0)&& ($third<=255) && ($third>=0)&& ($forth<=255) && ($forth>=0))
    {
        $l = new Yaurau_IP_Blocker();
        $l->set = $first .'.'. $second . '.' .$third . '.' . $forth;
        $l->enterIP();
        echo "IP $l->set blocked";
    }
    elseif($_POST['submit'])
     {
        $IP = $_POST['firstblockIP'] .'.'. $_POST['secondblockIP'] . '.' .$_POST['thirdblockIP'] . '.' . $_POST['fourthblockIP'];
        echo "Incorrect IP $IP";
    }
    ?>
    <p><h3>Add IPv6</h3>
    <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post">
        <label>Enter the IP</label>
        <input type="text" name="firstblockIPv6" maxlength="3" size="2">:
        <input type="text" name="secondblockIPv6" maxlength="3" size="2">:
        <input type="text" name="thirdblockIPv6" maxlength="3" size="2">:
        <input type="text" name="fourthblockIPv6" maxlength="3" size="2">:
        <input type="text" name="fifthblockIPv6" maxlength="3" size="2">:
        <input type="text" name="sixthblockIPv6" maxlength="3" size="2">:
        <input type="text" name="seventhblockIPv6" maxlength="3" size="2">:
        <input type="text" name="eighthblockIPv6" maxlength="3" size="2">
        <input type="submit" value="Enter" name="submitv6">
    </form>
    </p>
    <?php
    $firstIPv6 = $_POST['firstblockIPv6'];
    $secondIPv6 = $_POST['secondblockIPv6'];
    $thirdIPv6 = $_POST['thirdblockIPv6'];
    $forthIPv6 = $_POST['fourthblockIPv6'];
    $fifthIPv6 = $_POST['fifthblockIPv6'];
    $sixthIPv6 = $_POST['sixthblockIPv6'];
    $seventhIPv6 = $_POST['seventhblockIPv6'];
    $eighthIPv6 = $_POST['eighthblockIPv6'];
    if(isset($firstIPv6) && isset($secondIPv6) && isset($thirdIPv6) && isset($forthIPv6) && isset($fifthIPv6) && isset($sixthIPv6 ) && isset($seventhIPv6) && isset($eighthIPv6) && is_numeric($firstIPv6) && is_numeric($secondIPv6) && is_numeric($thirdIPv6) && is_numeric($forthIPv6) && is_numeric($fifthIPv6) && is_numeric($sixthIPv6 )  && is_numeric($seventhIPv6) && is_numeric($eighthIPv6) && ($firstIPv6<=255) && ($firstIPv6>=0) && ($secondIPv6<=255) && ($secondIPv6>=0)&& ($thirdIPv6<=255) && ($thirdIPv6>=0)&& ($forthIPv6<=255) && ($forthIPv6>=0) && ($fifthIPv6<=255) && ($fifthIPv6>=0)&& ($sixthIPv6<=255) && ($sixthIPv6>=0)&& ($seventhIPv6<=255) && ($seventhIPv6>=0)&& ($eighthIPv6<=255) && ($eighthIPv6>=0))
    {
        $l = new Yaurau_IP_Blocker();
        $l->set = $firstIPv6 .':'. $secondIPv6 .':'. $thirdIPv6 .':'. $forthIPv6 .':'. $fifthIPv6 .':'. $sixthIPv6 .':'. $seventhIPv6 .':'.$eighthIPv6;
        $l->enterIP();
        echo "IP $l->set blocked";
    }
    elseif($_POST['submitv6']) {
        $IP =  $firstIPv6 .':'. $secondIPv6 .':'. $thirdIPv6 .':'. $forthIPv6 .':'. $fifthIPv6 .':'. $sixthIPv6 .':'. $seventhIPv6 .':'.$eighthIPv6;
        echo "Incorrect IP $IP";
    }
    ?>
    <form action="options.php" method="POST">
        <?php
        settings_fields( 'new_option' );     // скрытые защитные поля - nonce
        do_settings_sections( MY_PLAGIN_PAGE ); // секции с настройками (опциями). У нас она всего одна 'section_id'
        submit_button();
        echo get_option('some_other_option');
        ?>
    </form>
</div>
<?php if(!empty(DB::loadIPDB()))
{ ?>
    <p><h3>Blocked IP</h3></p>
    <?php include_once __DIR__ . '/table_blocked_ IP.php';
}
?>
<?php if(!empty(DB::loadIPRepository()))
{ ?>
    <p><h3>Temporarily blocked IP</h3></p>
    <?php include_once __DIR__ . '/table_repository.php';
}
?>






