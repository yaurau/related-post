<?php

class Yaurau_IP_Repository
{
    static public function deleteIPbyRepository()
    {
        DB::deleteIPDBRepository();
        $file = __DIR__ . '/../../../../.htaccess';
        $data = file_get_contents($file);
        $l = 'Deny from ' . $_SERVER['REMOTE_ADDR'];
        $replace = str_replace($l,'', $data);
        file_put_contents($file, $replace);
    }
}