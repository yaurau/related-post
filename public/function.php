<?php
function msp_field() {
    $val = get_option('option');
    $val = $val ? $val['input'] : null;
    ?> <input type="text" name="option[input]" value="<?php
    if(esc_attr( $val )<200){
        echo "";
    }
    else {
        echo esc_attr( $val );
    }
     ?>" /><?php
}



