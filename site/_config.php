<?php

$_dev_servers = array('localhost','127.0.0.1','www.yeloworks.com','yeloworks.com');
$_dev_key = 'A5vfTP567657jyjdfffdfgdfgdfgeemt4';
if(!isset($_SERVER['SERVER_NAME'])){$_SERVER['SERVER_NAME']='localhost';}
define('SERVER_DEV',( (in_array($_SERVER['SERVER_NAME'], $_dev_servers))||isset($_GET[$_dev_key])));
define('SERVER_PROD',!SERVER_DEV);

global $project;
$_project_dir = rtrim(str_replace('\\','/',dirname(__FILE__)),'/').'/';
$project = 'youssefhaidar';
$theme_name = 'default';
$project_name = UcWords(str_replace('_',' ',$project));
$_project_log = dirname($_project_dir).'/log/'.$project.'-'.date('H-i-s').'.log';
$_project_url = 'http://'.(SERVER_PROD ? $project.'.com' : 'localhost');

global $databaseConfig;
$databaseConfig = SERVER_PROD ? include 'db_prod.php':include 'db_dev.php';

SSViewer::set_theme($theme_name);
i18n::set_locale('en_US');
SiteTree::enable_nested_urls();

Director::set_dev_servers($_dev_servers);

if(SERVER_DEV){
	ini_set('log_errors', 'On');
	ini_set('error_log', 'log');
	Director::set_environment_type('dev');
	ini_set('display_errors', E_ALL);
	ini_set('display_startup_errors', TRUE);
	error_reporting(E_ALL);
	Security::setDefaultAdmin('admin','password');
}


//SS_Log::add_writer(new SS_LogFileWriter($_project_log),SS_LOG::ERR);
LeftAndMain::setApplicationName($project_name,$project_name,$_project_url);
LeftAndMain::setLogo('themes/default/images/logo.png','width:162px;height:48px;display:inline-block;position: relative; left:110px; margin-top: -5px; padding-left: 0;');
LeftAndMain::set_loading_image('themes/default/images/logo_square.png');
DataObject::add_extension('SiteConfig', 'CustomSiteConfig');
