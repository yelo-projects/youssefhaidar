<?php
$_error_reporting = E_ALL ^ E_STRICT;
if(defined('E_DEPRECATED')){
	$_error_reporting = E_ALL & ~(E_DEPRECATED | E_STRICT);
}
ini_set('display_errors', $_error_reporting);
ini_set('display_startup_errors', TRUE);
error_reporting($_error_reporting);

/**/
error_reporting(0);
@ini_set('display_errors', 0);
/**/
define('BASE_PATH', dirname(__FILE__));include ('sapphire/main.php');
