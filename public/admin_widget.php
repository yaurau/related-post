<?php
function my_style_load() {
    $theme_uri = __DIR__ . '/public/css/1.css';
    wp_register_style('my_theme_style', $theme_uri, array());
    wp_enqueue_style('my_theme_style');
}
?>
<h1>
    Yaurau Random Quote
</h1>
    <br>
<h2>
    Add new quote
    </h2>
<p >
    <label>
        <h3 style="background: red">
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