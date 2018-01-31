<?php
class Yaurau_IP_Blocker_Parser
{
    static public function parse(){
        $max = (get_option('option'));
        $countViews = DB::getViews()[0]->number_views;
        if(($countViews >= $max['input']) && ($max['input']>300) && isset($_COOKIE['IP_blocker'])){
               $l = new Yaurau_IP_Blocker();
               $l->set = $_SERVER ['REMOTE_ADDR'];
               $l->enterIP();
        }
          else {
            DB::counterViews();
        }
    }
}