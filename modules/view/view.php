<?php
require_once '../../conf/smarty-conf.php';
include '../../functions/common_functions.php';
include 'view_functions.php';

if ($_REQUEST ['job'] == "view") {

	$smarty->assign ( 'page', "View" );
	$smarty->display ( 'view/view.tpl' );
}

elseif ($_REQUEST ['job'] == "submit") {
	$_SESSION ['view_session_array'] ['job_no'] = $_POST ['job_no'];
	$_SESSION ['view_session_array'] ['submit'] = 'true';

	$view_array=view_array($_SESSION ['view_session_array']);
	

	$smarty->assign ( 'view_session_array', $_SESSION ['view_session_array']);
	$smarty->assign ( 'view_array', $view_array);
	$smarty->assign ( 'page', "View" );
	$smarty->display ( 'view/view.tpl' );

}
elseif ($_REQUEST ['job'] == "preview") {
	$_SESSION ['view_session_array'] ['job_no'] = $_REQUEST['job_no'];
	

	$view_array=view_array($_SESSION ['view_session_array']);


	$smarty->assign ( 'view_session_array', $_SESSION ['view_session_array']);
	$smarty->assign ( 'view_array', $view_array);
	$output = $smarty->fetch('view/preview.tpl');
	
	$array = array (
			'text' => ($output) 
	);

	echo json_encode($array);
}
else{}