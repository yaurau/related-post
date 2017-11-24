<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Loader
{
    public static function loadQuote()
    {
        $load = new DB();
        $load->loadQuote();
        add_action ('basic_after_content', )
    }
}

