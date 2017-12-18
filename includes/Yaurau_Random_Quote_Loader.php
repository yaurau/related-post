<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Loader extends Yaurau_Random_Quote_Admin
{
    /*
    * Function name: load
    * Purpose: Load quote
    */
    public static function getQuote()
    {
        /*$load = new DB();
        $result = $load->loadQuote();
        foreach ( $result as $key) {
            return $key->quote;
        }*/
        return $_SERVER ['REMOTE_ADDR'];
    }
    public static function getAuthor()
    {
        $load = new DB();
        $result = $load->loadQuote();
        foreach ($result as $key) {
            return $key->author;
        }
    }
}

