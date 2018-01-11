<?php
class Yaurau_IP_Blocker_Time
{
    static public function resetTime(){
        $getTime = DB::getTime();
        $timeCreate = $getTime[0]['time'];
        $time = time() - $timeCreate;
        if($time < 86400) {
            return "IP blocking";
        }
    }
}