<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Yaurau_IP_Blocker_Parser
{
    /*
    * Function name: getIPDB
    * Purpose: parsing the query
    */
    static public function parseQuery(){
        $max = (get_option('option'));
        $countViews = Yaurau_IP_Blocker_DB::getViews()[0]->number_views;
        $timeCreate = Yaurau_IP_Blocker_DB::getTime()[0]->time;
        $time = time() - $timeCreate;
        if(($countViews >= $max['input']) && ($max['input']>4)){
            Yaurau_IP_Blocker_DB::setIPDBRepository();
            Yaurau_IP_Blocker_DB::deleteIPDB();
        }
        else {
            if($time > 86400){
                Yaurau_IP_Blocker_DB::updateData();
            }
            else{
                Yaurau_IP_Blocker_DB::counterViews();
            }
        }
    }
}