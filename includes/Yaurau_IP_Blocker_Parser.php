<?php
class Yaurau_IP_Blocker_Parser
{
    /*
    * Function name: getIPDB
    * Purpose: parsing the query
    */
    static public function parseQuery(){
        $max = (get_option('option'));
        $countViews = DB::getViews()[0]->number_views;
        $timeCreate = DB::getTime()[0]->time;
        $time = time() - $timeCreate;
        if(($countViews >= $max['input']) && ($max['input']>4)){
            DB::setIPDBRepository();
            DB::deleteIPDB();
        }
        else {
            if($time > 86400){
                DB::updateData();
            }
            else{
                DB::counterViews();
            }
        }
    }
}