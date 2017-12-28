<div class="wrap">
    <h2><?php echo get_admin_page_title() ?></h2>
    <p><h3>Blocked IP</h3></p>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">IP</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $gen = Yaurau_IP_Blocker::getIPDB();
                    foreach ($gen as $key=>$val) {
                    echo '<tr>'.'<th scope="row">' . ($key+1) . '</th>' . '<td>' . $val . '</td>' . '</tr>', PHP_EOL;
                    }
                    echo $gen->getReturn(), PHP_EOL;
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
    <p><h3>Add IPv4</h3>
    <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post">
        <label>Enter the IP</label>
        <input type="text" name="firstblockIP" maxlength="3" size="2">
        <input type="text" name="secondblockIP" maxlength="3" size="2">
        <input type="text" name="thirdblockIP" maxlength="3" size="2">
        <input type="text" name="fourthblockIP" maxlength="3" size="2">
        <input type="submit" value="Enter" name="submit">
    </form>
    </p>
    <?php
    if(!empty($_POST['firstblockIP'])&&!empty($_POST['secondblockIP'])&& !empty($_POST['thirdblockIP'])&&!empty($_POST['fourthblockIP']))
    {
        $l = new Yaurau_IP_Blocker();
        $l->set = $_POST['firstblockIP'] .'.'. $_POST['secondblockIP'] . '.' .$_POST['thirdblockIP'] . '.' . $_POST['fourthblockIP'];
        $l->countEnterIP();
    }
    if($_POST['submit'] && empty($_POST['firstblockIP']) || empty($_POST['secondblockIP'])|| empty($_POST['thirdblockIP'])|| empty($_POST['fourthblockIP'])) {
        echo "Incorrect IP";
    }
    ?>
    <p><h3>Add IPv6</h3>
    <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post">
        <label>Enter the IP</label>
        <input type="text" name="firstblockIPv6" maxlength="3" size="2">
        <input type="text" name="secondblockIPv6" maxlength="3" size="2">
        <input type="text" name="thirdblockIPv6" maxlength="3" size="2">
        <input type="text" name="fourthblockIPv6" maxlength="3" size="2">
        <input type="text" name="fifthblockIPv6" maxlength="3" size="2">
        <input type="text" name="sixthblockIPv6" maxlength="3" size="2">
        <input type="submit" value="Enter" name="submitv6">
    </form>
    </p>
    <?php
    if(!empty($_POST['firstblockIPv6'])&&!empty($_POST['secondblockIPv6'])&& !empty($_POST['thirdblockIPv6'])&&!empty($_POST['fourthblockIPv6']) &&!empty($_POST['fifthblockIPv6']) &&!empty($_POST['sixthblockIPv6']))
    {
        $l = new Yaurau_IP_Blocker();
        $l->set = $_POST['firstblockIP'] .':'. $_POST['secondblockIP'] . ':' .$_POST['thirdblockIP'] . ':' . $_POST['fourthblockIP'];
        $l->countEnterIP();
    }
    if($_POST['submitv6'] && empty($_POST['firstblockIPv6']) || empty($_POST['secondblockIPv6'])|| empty($_POST['thirdblockIPv6'])|| empty($_POST['fourthblockIPv6']) || empty($_POST['fifthblockIPv6']) && empty($_POST['sixthblockIPv6'])) {
        echo "Incorrect IP";
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


