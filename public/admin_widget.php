
<div class="wrap">
    <h2><?php echo get_admin_page_title() ?></h2>

    <form action="options.php" method="POST">
        <?php
        settings_fields( 'option' );     // скрытые защитные поля - nonce

        do_settings_sections( MY_PLAGIN_PAGE ); // секции с настройками (опциями). У нас она всего одна 'section_id'
        echo get_option('baw-settings-group');
        submit_button();
        ?>
    </form>
</div>

