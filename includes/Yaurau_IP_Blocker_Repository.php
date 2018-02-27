<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Yaurau_IP_Blocker_Repository
{
    /*
    * Function name: deleteIPbyRepository
    * Purpose: delete IP by repository
    */
    static public function deleteIPbyRepository(){
        Yaurau_IP_Blocker_DB::deleteIPDBRepository();
    }
}