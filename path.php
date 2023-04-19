<?php

define("DIR_ROOT",__DIR__); //for directory

define("URL_ROOT","http://".$_SERVER['SERVER_NAME']."/demo_copy"); //for url



/**
 * url constant
 */
define("URL_ASSETS",URL_ROOT."/assests");
define("URL_JS",URL_ROOT."/js");
define("URL_FORM",URL_ROOT."/admin/form");



// print_r($_SERVER);

//echo URL_CSS;
/**
 * directory constant
 */

define("CONFIG",DIR_ROOT."/admin/config");

define("FORM",DIR_ROOT."/admin/form");
define("INC",DIR_ROOT."/admin/includes");
define("REGISTRATION",DIR_ROOT."/admin/registration");
define("DASHBOARD",DIR_ROOT."/admin/dashboard");
define("USER",DIR_ROOT."/admin/user");


require_once(CONFIG."/dbcon.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
 }





