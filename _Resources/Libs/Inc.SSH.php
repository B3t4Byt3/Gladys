<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

if (basename(__FILE__) == basename($_SERVER["REQUEST_URI"]))
        header ('location: Error_Hack');

/***********************************************************
*   Check if SSH
***********************************************************/
    try {
        define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);
        //$SSH = new Net_SSH2('gladysservers.ddns.net');
        $SSH = new Net_SSH2('192.168.0.7');
        if (!$SSH->login('pi', 'raspberry')) {
            // exit('Login Failed');
        }
    } catch (Exception $Error) {
        $SSH = new Net_SSH2('192.168.0.1');
        echo $SSH->getLog();
    }

?>