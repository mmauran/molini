<?php
require_once '../../conf/smarty-conf.php';
include '../../functions/user_functions.php';
include '../../functions/common_functions.php';

if ($_REQUEST ['job'] == "login") {
	

	$username = $_POST ['username'];
	$password = $_POST ['password'];
	
	if (check_login($username, $password)) {
		
		$info=select_all_data('user_name', $username, 'users');
		
		$_SESSION ['user_id'] = $info['id'];
		$_SESSION['login']=1;
		$_SESSION['user_name']=$username;
		$_SESSION['full_name']=$info['full_name'];
		
		header( 'Location: ../create_job/create_job.php?job=create_job' ) ;
	} 

	else {
		
		$smarty->assign ( 'page', "Login" );
		$smarty->assign ( 'error', "true" );
		$smarty->display ( '../login.tpl' );
	}
} 

elseif ($_REQUEST ['job'] == "logout") {
	unset($_SESSION['login']);
	$smarty->display ( '../login.tpl' );
} 

else {
	
	$smarty->display ( '../login.tpl' );
}