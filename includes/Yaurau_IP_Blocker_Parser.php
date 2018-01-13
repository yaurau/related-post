<?php
class Yaurau_IP_Blocker_Parser
{
    static public function resetTime(){
        $max = (get_option('option'));
        $countViews = DB::getViews()[0]->number_views;
        $timeCreate = DB::getTime()[0]->time;
        $time = time() - $timeCreate;
        if(($countViews >= $max['input']) && $time < 86400){
            $l = new Yaurau_IP_Blocker();
            $l->set = $_SERVER ['REMOTE_ADDR'];
            $l->enterIP();
        }
        else {
            DB::counterViews();
        }
    }
}