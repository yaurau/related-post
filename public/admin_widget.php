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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>

                </tr>

                </tbody>
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
    <p><h3>Add IP</h3>
    <form>
        <label>Enter the IP</label>
        <input type="text">
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
