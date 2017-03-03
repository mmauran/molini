<?php
//php7 Ready!
//Smarty3 Ready!
function check_login($login, $passcode) {
	
	$passcode = md5 ( $passcode );
	
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
	SELECT id 
	FROM users 
	WHERE user_name = '$login' 
	AND password= '$passcode'	
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		if (mysqli_num_rows ($result)) {
		
			return 1;
			
		}
		
		else {
		
			return 0;
		}
	}

	
}

function check_access($module_id, $user_id) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	

		$sql = <<<SQL
	SELECT count(id) 
	FROM users_has_module 
	WHERE users_id='$user_id' 
	AND module_id='$module_id'	
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		if ($row ['count(id)'] >= 1) {
			
			return 1;
		} 

		else {
			return 0;
		}
	}
}
