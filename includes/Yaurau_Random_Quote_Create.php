<?php


class Yaurau_Random_Quote_Create
{
    public function createQuote()
    {
        $load = new DB();
        $load->createQuote();
    }
}