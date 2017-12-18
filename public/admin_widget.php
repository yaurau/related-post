<?php
global $submenu;

// access page settings
$page_data = array();

foreach ($submenu['options-general.php'] as $i => $menu_item) {
    if ($submenu['options-general.php'][$i][2] == 'msp_helloworld') {
        $page_data = $submenu['options-general.php'][$i];
    }
}
// output
?>
<div class="wrap">
    <?php screen_icon();
    var_dump($submenu['options-general.php']);
    ?>
    <h2><?php echo $page_data[3]; ?></h2>
    <form id="msp_helloworld_options" action="options.php" method="post">
        <?php
        settings_fields('msp_helloworld_options');
        do_settings_sections('msp_helloworld');
        submit_button('Save options', 'primary', 'msp_helloworld_options_submit');
        ?>
    </form>
</div>
<h1>
    Yaurau Random Quote
</h1>
    <br>
<h2>
    Add new quote
    </h2>
<p >
    <label>
        <h3 class="local">
            Quote
        </h3>
    </label>
        <textarea type="text" name="quote" cols="150"></textarea>
</p>
<p>
    <label>
        <h3>
           Author
        </h3>
    </label>
        <input type="text" name="author" size="150" >
</p>
    <input type="submit" value="Submit">