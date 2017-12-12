<?php
require_once __DIR__ . '/../autoload.php';
echo Yaurau_Random_Quote_Loader::getQuote(). "<br><p align='right'>" . Yaurau_Random_Quote_Loader::getAuthor() . '</p>';