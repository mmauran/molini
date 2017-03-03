<?php
function job_array($data) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	require_once 'modules/translate/translate_functions.php';
	
	if ($data [to_date]) {
		
		$date_query = "AND `created` BETWEEN '$data[from_date]' AND '$data[to_date]'";
	} else {
		$date_query = "";
	}
	
	if ($data [user_id]) {
		
		$user_query = "AND user_id = '$data[user_id]'";
	} else {
		$user_query = "";
	}
	
	$sql = <<<SQL
	SELECT
	*
	FROM job
	WHERE 1
	$date_query
	$user_query
	ORDER BY job_no DESC
	LIMIT 100
SQL;
	
	
	$i = 0;
	$job_array = array ();
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		
		$job_name = strlen ( $row [job_name] ) > 50 ? substr ( $row [job_name], 0, 50 ) . "..." : $row [job_name];
		$created = date_format ( date_create ( "$row[created]" ), 'd-m-Y' );
		$count_array = get_job_count ( $row [job_no] );
		$translated = round ( ($count_array ['total_translated'] / $count_array ['total_lines']) * 100 );
		$completed = round ( ($count_array ['total_completed'] / $count_array ['total_lines']) * 100 );
		
		$job_array [$i] = array (
				'serial_order' => ($i + 1),
				'job_id' => ($row [id]),
				'job_no' => ($row [job_no]),
				'job_name' => ($job_name),
				'source_language' => ($row [source_language]),
				'target_language' => ($row [target_language]),
				'status' => ($row [status]),
				'created' => ($created),
				'completed' => ($completed),
				'translated' => ($translated),
				'updated' => ($row [updated]),
				'privacy' => ($row [privacy])
		);
		
		$i ++;
	}
	
	return $job_array;
	
	include 'functions/closedb.php';
}