<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

namespace lib;

class Memory {

    public static $DETAIL_LINE_COUNT = 5;

    public static function ram() {
        global $ssh;

        $result = array();

        $out = $ssh->exec_noauth('free -mo');
        preg_match_all('/\s+([0-9]+)/', $out[1], $matches);
        list($total, $used, $free, $shared, $buffers, $cached) = $matches[1];

        $ramDetails = $ssh->shell_exec_noauth('ps -e -o pmem,user,args --sort=-pmem | sed "/^ 0.0 /d" | head -' . self::$DETAIL_LINE_COUNT);

        $result['percentage'] = round(($used - $buffers - $cached) / $total * 100);
        if ($result['percentage'] >= '80')
            $result['alert'] = 'warning';
        else
            $result['alert'] = 'success';

        $result['free'] = $free + $buffers + $cached;
        $result['used'] = $used - $buffers - $cached;
        $result['total'] = $total;
        $result['detail'] = $ramDetails;

        return $result;
    }

    public static function swap() {
        global $ssh;
        $result = array();

        $out = $ssh->exec_noauth('free -mo');
        preg_match_all('/\s+([0-9]+)/', $out[2], $matches);
        list($total, $used, $free) = $matches[1];

        $result['percentage'] = round($used / $total * 100);
        if ($result['percentage'] >= '80')
            $result['alert'] = 'warning';
        else
            $result['alert'] = 'success';

        $result['free'] = $free;
        $result['used'] = $used;
        $result['total'] = $total;

        return $result;
    }

}

?>
