<?php
class Yaurau_IP_Blocker_Parser
{
    static public function parse(){
        $max = (get_option('option'));
        $countViews = DB::getViews()[0]->number_views;
        $timeCreate = DB::getTime()[0]->time;
        $time = time() - $timeCreate;
        if(($countViews >= $max['input']) && ($max['input']>300)){
               $l = new Yaurau_IP_Blocker();
               $l->set = $_SERVER ['REMOTE_ADDR'];
               $l->enterIP();
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