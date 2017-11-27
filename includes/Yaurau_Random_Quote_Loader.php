<?php
require_once __DIR__ . '/../autoload.php';
class Yaurau_Random_Quote_Loader
{
    /*
    * Function name: load
    * Purpose: Load quote
    */
    public static function load()
    {
        $load = new DB();
        $result = $load->loadQuote();
        var_dump($result);
        echo $result->quote;
        foreach ( $result as $key) {
            return $key->quote . "<br><p align='right'>" . $key->author . '</p>';
        }



    }
}

