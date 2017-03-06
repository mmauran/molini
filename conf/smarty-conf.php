<?php
ini_set('session.gc_maxlifetime', 36000);
session_set_cookie_params(36000);
session_start();

//settings
define('MYPATH','/var/www/html/molini/');

//settings end
set_include_path(MYPATH."libs" . PATH_SEPARATOR . get_include_path());
set_include_path(MYPATH."". PATH_SEPARATOR . get_include_path());
// load Smarty library
require_once('Smarty.class.php');
//require_once('SmartyPaginate.class.php');
//Create Object
$smarty = new Smarty;
$smarty->template_dir = MYPATH.'modules';
$smarty->config_dir =  MYPATH.'view/configs';
$smarty->cache_dir = MYPATH.'view/smarty_cache';
$smarty->compile_dir = MYPATH.'smarty_c/';

$smarty->assign ( 'username', $_SESSION['user_name'] );
?>
