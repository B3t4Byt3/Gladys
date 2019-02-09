<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
        header ('location: Error_Hack');
}

$Auth = new Auth();

class Auth {

    function Is_Login() {
        if (isset($_SESSION['Auth']) 
            || isset($_SESSION['Auth']['ID']) 
            || isset($_SESSION['Auth']['Username']) 
            || isset($_SESSION['Auth']['Status']) 
            || isset($_SESSION['Auth']['Password'])) {
        if ($_SESSION['Auth']['Status'] == 'Activated') {
            return true;
        } else {
            return false;
        }
        } else {
            return false;
        }
    }

    function Is_Administrator() {
        if (isset($_SESSION['Auth'])) {
            if ($_SESSION['Auth']['Rank'] == 'Administrator') {
                return true;
            } else {
                return false;
            }
        }
    }
    
}

?>