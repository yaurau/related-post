<?php
function msp_helloworld_authorbox_field()
{
$val = get_option('option');
$val = $val ? $val['input'] : null;
?>
<input type="text" name="option[input]" value="<?php echo esc_attr( $val ) ?>" />
<?php
}
/*
function doll_css() {

    echo "<link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
";

    echo "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script>";
    $path = plugin_dir_url(__FILE__) . 'js/jquery.tabledit.min.js';
    echo "<script src=\"$path\"></script>";
}
*/
?>