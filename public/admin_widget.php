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
    <p><h3>Add IP</h3>
    <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post">
        <label>Enter the IP</label>
        <input type="text" name="blockIP">
        <input type="submit" value="Enter">
    </form>
    </p>
    <form action="options.php" method="POST">
        <?php
        settings_fields( 'new_option' );     // скрытые защитные поля - nonce
        do_settings_sections( MY_PLAGIN_PAGE ); // секции с настройками (опциями). У нас она всего одна 'section_id'
        submit_button();
        echo get_option('some_other_option');
        ?>
    </form>
</div>
<?php
    $l = new Yaurau_IP_Blocker();
    $l->set = $_POST['blockIP'];
    $l->countEnterIP();