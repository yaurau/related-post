<?php
/**
 *  @author   Rauvtovich Yauhen
 *  @copyright Y.Rauvtovich 2018
 *  @license   GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) exit;
class Yaurau_IP_Blocker_Repository
{
    /**
     * Function name: deleteIPbyRepository
     * Purpose: delete IP by repository
     */
    static public function deleteIPbyRepository(){
        Yaurau_IP_Blocker_DB::deleteIPDBRepository();
    }
}