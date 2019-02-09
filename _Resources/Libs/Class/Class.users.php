<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

namespace lib;

class Users {

    public static function connected() {
        global $ssh;

        $result = array();

        $dataRaw = $ssh->shell_exec_noauth("who --ips");
        $dataRawDNS = $ssh->shell_exec_noauth("who --lookup");

        if (empty($dataRaw))
            $dataRaw = $ssh->shell_exec_noauth("who");

        foreach (explode("\n", $dataRawDNS) as $line) {
            $line = preg_replace("/ +/", " ", $line);

            if (strlen($line) > 0) {
                $line = explode(" ", $line);
                $temp[] = $line[5];
            }
        }

        $i = 0;
        foreach (explode("\n", $dataRaw) as $line) {
            $line = preg_replace("/ +/", " ", $line);

            if (strlen($line) > 0) {
                $line = explode(" ", $line);

                $result[] = array(
                    'user' => $line[0],
                    'ip' => $line[5],
                    'dns' => $temp[$i],
                    'date' => $line[2] . ' ' . $line[3],
                    'hour' => $line[4]
                );
            }
            $i++;
        }

        return $result;
    }

}

?>
