<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

if (basename(__FILE__) == basename($_SERVER["REQUEST_URI"]))
        header ('location: Error_Hack');

/***********************************************************
*   BASE DE DONNEE PDO LOCALHOST
***********************************************************/
    $MYSQL_HOST ='localhost';
    $MYSQL_BDD  ='gladysdashboard';
    $MYSQL_USER ='root';
    $MYSQL_PASS ='';
    $MYSQL_PORT ='3306';

/***********************************************************
*   BASE DE DONNEE PDO TEST
***********************************************************/
    //$MYSQL_HOST ='localhost';
    //$MYSQL_BDD  ='id1604192_b3t4byt3';
    //$MYSQL_USER ='id1604192_b3t4byt3';
    //MYSQL_PASS ='1348599Az';
    //$MYSQL_PORT ='3306';

/***********************************************************
*   BASE DE DONNEE PDO ONLINE
***********************************************************/
    //$MYSQL_HOST ='b3t4byt3.sql-pro.online.net';
    //$MYSQL_BDD  ='b3t4byt3';
    //$MYSQL_USER ='b3t4byt3';
    //$MYSQL_PASS ='x43u24CLbZ';
    //$MYSQL_PORT ='3306';

try {
    $MyPDO = new PDO('mysql:host='.$MYSQL_HOST.';port='.$MYSQL_PORT.';dbname='.$MYSQL_BDD, $MYSQL_USER, $MYSQL_PASS);
    $MyPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $MyPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $MyPDO->exec("SET CHARACTER SET utf8");
} catch (Exception $Error) {
    header('location: /');
}

?>