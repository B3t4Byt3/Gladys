<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2017 By B3t4Byt3 , All Rights Reserved._____________|
*/

if (basename(__FILE__) == basename($_SERVER["REQUEST_URI"])) {
        header ('location: Error_Hack');
}

$Settings = new Settings($MyPDO);

class Settings {
    var $MyPDO;

    function __CONSTRUCT($MyPDO) {
        $this -> MyPDO = $MyPDO;
    }

    function Maintenance() {
        $SQL = $this -> MyPDO -> prepare('SELECT * FROM settings');
        $SQL -> execute();
        $DATA = $SQL->fetch();

        return $DATA['Coming_Soon'];

        $SQL -> closeCursor();
    }

    function Ip_Maintenance() {
        $SQL = $this -> MyPDO -> prepare('SELECT * FROM settings WHERE Maintenance_IP = :Maintenance_IP');
        $SQL -> execute(array(':Maintenance_IP' => GET_REAL_IP()));
        $DATA = $SQL->fetch();

        return $DATA['Maintenance_IP'];

        $SQL -> closeCursor();
    }

    function Debug() {
        $SQL = $this -> MyPDO -> query('SELECT * FROM settings');
        $DATA = $SQL->fetch();
        return $DATA['Debugger'];

        $SQL -> closeCursor();
    }
}

?>