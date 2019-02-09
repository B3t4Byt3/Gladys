<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2017 By B3t4Byt3 , All Rights Reserved._____________|
*/

if (basename(__FILE__) == basename($_SERVER["REQUEST_URI"])) {
        header ('location: Error_Hack');
}

$Statistic = new Statistic($MyPDO);
$Statistic_Server = new Statistic_Server($MyPDO);

class Statistic {
    var $MyPDO;

    function __CONSTRUCT($MyPDO) {
        $this -> MyPDO = $MyPDO;
    }

    function Total_Server_Online() {
        $SQL = $this -> MyPDO -> prepare('SELECT COUNT(*) FROM servers WHERE Status = :Status');
        $SQL -> execute(array(':Status' => 'Activated'));
        $COUNT = $SQL -> fetchColumn(0);
        return $COUNT;

        $SQL -> closeCursor();
    }

    function Total_Server_Offline() {
        $SQL = $this -> MyPDO -> prepare('SELECT COUNT(*) FROM servers WHERE Status = :Status');
        $SQL -> execute(array(':Status' => 'Inactivated'));
        $COUNT = $SQL -> fetchColumn(0);
        return $COUNT;

        $SQL -> closeCursor();
    }
}

class Statistic_Server {
    var $MyPDO;

    function __CONSTRUCT($MyPDO) {
        $this -> MyPDO = $MyPDO;
    }

    function Server_Load() {
        $Server_Load = mt_rand(0, 80)/10;
        $MAX_SL = 8;
        $V_SL = 100;
        $Server_Load_ = 100;
        return $Server_Load;
    }

    function Server_Load_() {
        $Server_Load = mt_rand(0, 80)/10;
        $MAX_SL = 8;
        $V_SL = 100;
        $Server_Load_ = ($Server_Load * $MAX_SL / $V_SL);
        return $Server_Load_;
    }

    function Apps() {
        $Apps = mt_rand(0, 80)/10;
        $MAX_SL = 8;
        $V_SL = 100;
        $Apps_ = ($Apps * $MAX_SL / $V_SL);
        return $Apps;
    }      

    function Apps_() {
        $Apps = mt_rand(0, 80)/10;
        $MAX_SL = 8;
        $V_SL = 100;
        $Apps_ = ($Apps * $MAX_SL / $V_SL);
        return $Apps_;
    }

    function Process() {
        $Process = mt_rand(0, 100);
        $MAX_SL = 100;
        $V_SL = 100;
        $Process_ = ($Process * $MAX_SL / $V_SL);
        return $Process;
    }    

    function Process_() {
        $Process = mt_rand(0, 100);
        $MAX_SL = 100;
        $V_SL = 100;
        $Process_ = ($Process * $MAX_SL / $V_SL);
        return $Process_;
    }

    function Attack_DDOS() {
        $Attack_DDOS = mt_rand(0, 1)/100;
        $MAX_SL = 1000;
        $V_SL = 100;
        $Attack_DDOS_ = ($Attack_DDOS * $MAX_SL / $V_SL);
        return $Attack_DDOS;
    }

    function Attack_DDOS_() {
        $Attack_DDOS = mt_rand(0, 1)/100;
        $MAX_SL = 1000;
        $V_SL = 100;
        $Attack_DDOS_ = ($Attack_DDOS * $MAX_SL / $V_SL);
        return $Attack_DDOS_;
    }

    function Ram() {
        $Ram = mt_rand(0, 50)/10;
        $MAX_SL = 16;
        $V_SL = 100;
        $Ram_ = ($Ram * $MAX_SL / $V_SL);
        return $Ram;
    }     

    function Ram_() {
        $Ram = mt_rand(0, 50)/10;
        $MAX_SL = 16;
        $V_SL = 100;
        $Ram_ = ($Ram * $MAX_SL / $V_SL);
        return $Ram_;
    }

    function Bande_Passante() {
        $Bande_Passante = mt_rand(1, 5000)/10;
        $MAX_SL = 500;
        $V_SL = 100;
        $Bande_Passante_ = ($Bande_Passante * $MAX_SL / $V_SL);
        return $Bande_Passante;
    }     

    function Bande_Passante_() {
        $Bande_Passante = mt_rand(1, 5000)/10;
        $MAX_SL = 500;
        $V_SL = 100;
        $Bande_Passante_ = ($Bande_Passante * $MAX_SL / $V_SL);
        return $Bande_Passante_;
    }
}

?>