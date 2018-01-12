<?php
class Yaurau_IP_Blocker_Time
{
    static public function resetTime(){
        $getTime = DB::getTime();
        $countViews = DB::getViews();
        var_dump($countViews);
        $timeCreate = $getTime[0]['time'];
        $time = time() - $timeCreate;
        if($time < 86400) {
            return "IP blocking";
        }
        else {
            return "IP don't blocking";
        }
    }
}