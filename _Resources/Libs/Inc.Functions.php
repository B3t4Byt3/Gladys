<?php

/*__________________________________________________________________________|
|____GladysDashboard Advanced System _______________________________________|
|____Copyright (c) 2016-2018 By B3t4Byt3 , All Rights Reserved._____________|
*/

if (basename(__FILE__) == basename($_SERVER["REQUEST_URI"])) {
        header ('location: Error_Hack');
}

/***********************************************************
*   VARIABLES
***********************************************************/
$DIR = dirname(__FILE__);

/***********************************************************
*   SETTINGS

***********************************************************/
function Settings() {
	if($XXXX['XXXX'] == 'XXXX') {
	} 
	else {	

	}
}

/***********************************************************
*   DEBUGGER ERROR
***********************************************************/
function Debug_Error() {
	if($IH_Config['DEBUG'] == 'Activated') {
	} 
	else {	
		ini_set("display_errors",0);
		ini_set("html_errors",0);
		error_reporting(0);
	}
}

/***********************************************************
*   DEGUGGER AFFICHAGE
***********************************************************/
function Debug_AFF() {

	$NB_Tests = 10000000;
 
function Microtime_Float() {
	list($Usec, $Sec) = explode(" ", microtime());
	return ((float)$Usec + (float)$Sec);
}

$Time_Start = microtime_float();

function Number_Space ($Number) {
	$Number_Space = number_format($Number, 0, ',', ' ');
	return $Number_Space;
}

	echo "<h3>SERVER</h3>";
		print_r($_SERVER); 

	echo "<h3>CONSTANTE</h3>";
		print_r(get_defined_constants()); 

	echo "<h3>SESSION</h3>";
		print_r($_SESSION);

	echo "<h3>GENERATION</h3>";
		$Time_End = Microtime_Float();
		$Time = round($Time_End - $Time_Start, 8);
		$NBTPS = Number_Space(round($NB_Tests / $Time));
		$NB_Tests_Display = Number_Space($NB_Tests);
		
		print_r('Page générée en '.$Time.' s avec '.$NB_Tests_Display.' tests effectués soit '.$NBTPS.' tests par seconde.');
} 

/***********************************************************
*   URL ACTUEL
***********************************************************/
function GET_URL_ACTUEL() {
	return $_SERVER["REQUEST_URI"];
}

/***********************************************************
*   REAL IP
***********************************************************/
function GET_REAL_IP() {
	if (!empty($_SERVER['HTTP_CF_CONNECTING_IP']))
	{
		$userIP = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$userIP = $_SERVER['HTTP_CLIENT_IP'];
	}
	else
	{
		$userIP = $_SERVER['REMOTE_ADDR'];
	}
	return $userIP;
}
?>