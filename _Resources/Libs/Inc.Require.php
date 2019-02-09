<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

session_start();

if (basename(__FILE__) == basename($_SERVER["REQUEST_URI"])) {
        header ('location: Error_Hack');
}

require_once dirname(__FILE__) .'/Inc.MySql.php';
require_once dirname(__FILE__) .'/Inc.Functions.php';

require_once dirname(__FILE__) .'/SSH/Net/SSH2.php';
require_once dirname(__FILE__) .'/Inc.SSH.php';

require_once dirname(__FILE__) .'/Class/Class.Config.php';
require_once dirname(__FILE__) .'/Class/Class.Statistic.php';
require_once dirname(__FILE__) .'/Class/Class.Settings.php';

require_once dirname(__FILE__) .'/Auth.php';

/* Check Maintenance */
if($Settings->Maintenance() == 'Activated') {
	if($Settings->Ip_Maintenance() == GET_REAL_IP()) {
	} elseif (GET_URL_ACTUEL() == 'Coming_Soon') {
	} elseif($Settings->Maintenance() == 'Activated') {
	  header('location: /Coming_Soon');
	}
}

// /* Check Debug */
// if($Settings->Debug() == 'Activated') {
// 	if($Settings->Ip_Maintenance() == GET_REAL_IP()) {
// 	} elseif (GET_URL_ACTUEL() == 'Coming_Soon') {
// 	} elseif($Settings->Debug() == 'Activated') {
// 	  header('location: /Coming_Soon');
// 	}
// }

/* Check Version PHP */
if(version_compare(phpversion(), '7.0.0', '<')) {
    die("Please upgrade to PHP 7.0.x, this source does not support anything below that!");
}

/* Check if Curl */
if(!in_array('curl', get_loaded_extensions())) {
	die("Please install the Curl Library for this program to work!");
}

/* Check if fsockopen */
if(!function_exists('fsockopen')) {
	die('Please enable fsockopen() in your php.ini file');
}

/* Check if SSH */
// if(!function_exists('ssh')) {
// 	die('Please enable SSH in your php.ini file');
// }

?>