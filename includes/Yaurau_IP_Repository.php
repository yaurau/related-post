<?php

class Yaurau_IP_Repository
{
    /*
    * Function name: deleteIPbyRepository
    * Purpose: delete IP by repository
    */
    static public function deleteIPbyRepository()
    {
        foreach (DB::getIPRepository() as $value){
            foreach ($value as $IP){
                $delete = new DB;
                $delete->IP = $IP;
                $delete->deleteIPDBRepository();
                $file = __DIR__ . '/../../../../.htaccess';
                $data = file_get_contents($file);
                $l = 'Deny from ' . $IP;
                $replace = str_replace($l,'', $data);
                file_put_contents($file, $replace);
            }
        }
    }
}