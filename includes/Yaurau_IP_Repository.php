<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Yaurau_IP_Repository
{
    /*
    * Function name: deleteIPbyRepository
    * Purpose: delete IP by repository
    */
    static public function deleteIPbyRepository(){
        DB::deleteIPDBRepository();
    }
}