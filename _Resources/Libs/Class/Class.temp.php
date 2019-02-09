<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

namespace lib;

class Temp {

    public static $DETAIL_LINE_COUNT = 5;

    public static function temp() {
        $result = array();

        $temp_file = "/sys/bus/w1/devices/28-000004e8a0f3/w1_slave";
        if (file_exists($temp_file)) {
            $lines = file($temp_file);
            $pos = strpos($lines[1], "t=");
            $currenttemp = round(substr($lines[1], $pos + 2) / 1000, 1) . "°C";
        } else {
            $currenttemp = "N/A";
        }
        $result['alert'] = 'success';
        $result['degrees'] = $currenttemp;

        return $result;
    }

}

?>
