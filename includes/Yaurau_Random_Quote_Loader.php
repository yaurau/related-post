<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Loader
{
    /*
    * Function name: load
    * Purpose: Load quote
    */
    public static function getQuote()
    {
        $load = new DB();
        $result = $load->loadQuote();
        foreach ( $result as $key) {
            return $key->quote;
        }
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

