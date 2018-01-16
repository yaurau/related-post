<?php
class Yaurau_IP_Blocker_Parser
{
    static public function parse(){
        $max = (get_option('option'));
        $countViews = DB::getViews()[0]->number_views;
        $timeCreate = DB::getTime()[0]->time;
        $time = time() - $timeCreate;
        if(($countViews >= $max['input']) && ($time < 86400)){
            echo 'Block IP';
/*
            $l = new Yaurau_IP_Blocker();
            $l->set = $_SERVER ['REMOTE_ADDR'];
            $l->enterIP();
*/
        }
        echo $time;
        if ($time > 86400){
            //echo "DELETE";
            DB::deletIP();
        }
        else {
            DB::counterViews();
        }
    }
}