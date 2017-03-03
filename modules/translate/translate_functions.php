<?php
function lines_array($data) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
	SELECT
	*
	FROM text_lines
	WHERE 1
	AND job_no = '$data[job_no]'
	ORDER BY para_no, line_no ASC
SQL;
	
	$i = 0;
	$lines_array = array ();
	$para_no = 1;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		if ($para_no == $row [para_no]) {
			$para_break = 'false';
		} else {
			$para_break = 'true';
		}
		$s = trim ( $row [source_line], '?!.,;:[]()/*{}|"\'' );
		$molini_array = molini_lookup_array ( $s, $row [id] );
		if ($molini_array ['count'] > 0) {
			$available = 1;
		} 

		else {
			$available = 0;
		}
		
		$lines_array [$i] = array (
				'line_id' => ($row [id]),
				'job_no' => ($row [job_no]),
				'para_no' => ($row [para_no]),
				'line_no' => ($row [line_no]),
				'source_line' => ($row [source_line]),
				'target_line' => ($row [target_line]),
				'source_language' => ($row [source_language]),
				'target_language' => ($row [target_language]),
				'source_updated' => ($row [source_updated]),
				'target_updated' => ($row [target_updated]),
				'line_status' => ($row [line_status]),
				'para_break' => ($para_break),
				'translation_available' => ($available),
				'translation' => ($molini_array[text])
		);
		
		$para_no = $row [para_no];
		$i ++;
	}
	
	return $lines_array;
	
	include 'functions/closedb.php';
}
function save_line($line_id, $target_line) {
	$array = array ();
	$current_time = date ( 'Y-m-d H:i:s' );
	$target_line = addslashes ( trim ( $target_line ) );
	$info = select_all_data ( 'id', $line_id, 'text_lines' );
	$count_array = get_job_count ( $info ['job_no'] );
	$translated = round ( ($count_array ['total_translated'] / $count_array ['total_lines']) * 100 );
	$completed = round ( ($count_array ['total_completed'] / $count_array ['total_lines']) * 100 );
	
	$target_line_data = array (
			'target_line' => "'$target_line'",
			'target_updated' => "'$current_time'" 
	);
	
	update_data ( $target_line_data, 'text_lines', 'id', $line_id );
	$text = "$current_time";
	
	
	$array = array (
			'text' => ($text),
			'translated_percentage' => "$translated%",
			'completed_percentage' => "$completed%",
			'line_status' => "$info[line_status]" 
	)
	;
	
	return $array;
}
function save_source_line($line_id, $source_line) {
	$array = array ();
	$current_time = date ( 'Y-m-d H:i:s' );
	$source_line = addslashes ( $source_line );
	$info = select_all_data ( 'id', $line_id, 'text_lines' );
	
	$source_line_data = array (
			'source_line' => "'$source_line'",
			'source_updated' => "'$current_time'" 
	)
	;
	
	update_data ( $source_line_data, 'text_lines', 'id', $line_id );
	$text = "$current_time";
	
	$array = array (
			'text' => ($text) 
	);
	
	return $array;
}
function molini_lookup_array($search_text, $line_id) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	if ($line_id == 0) {
		$line_query = "";
	} else {
		$line_query = "AND id != '$line_id'";
	}
	
	$search_text = strtolower ( addslashes ( $search_text ) );
	
	$sql = <<<SQL
	SELECT
	source_line as result_source,
	target_line as result_target
	FROM text_lines
	WHERE 1
	$line_query
	AND source_line LIKE LOWER('%$search_text%')
	AND line_status='COMPLETE'
	UNION ALL
	SELECT
	target_line as result_source,
	source_line as result_target
	FROM text_lines
	WHERE 1
	$line_query
	AND target_line LIKE LOWER('%$search_text%')
	AND line_status='COMPLETE'
SQL;
	
	$i = 0;
	$lines_array = array ();
	$text = '';
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		
		$lines_array [$i] = array (
				'result_source' => ("$row[result_source]"),
				'result_target' => ("$row[result_target]") 
		);
		
		$i ++;
	}
	
	foreach ( $lines_array as $line ) {
		
		$source = str_replace ( "$search_text", "<strong><u>$search_text</u></strong>", $line [result_source] );
		
		$text = $text . $source . '<br />' . $line ['result_target'] . '<br /><hr>';
	}
	
	$array = array (
			'count' => ($i),
			'text' => ($text) 
	);
	
	return $array;
	include 'functions/closedb.php';
}
function get_job_count($job_no) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
	SELECT
	SUM(total_lines) as total_lines,
	SUM(total_translated) as total_translated,
	SUM(total_completed) as total_completed
	FROM
	(SELECT
	COUNT(t1.id) as total_lines,
	0 as total_translated,
	0 as total_completed
	FROM text_lines t1
	WHERE 1
	AND t1.job_no = '$job_no'
	UNION
	SELECT
	0 as total_lines,
	COUNT(t2.id) as total_translated,
	0 as total_completed
	FROM text_lines t2
	WHERE 1
	AND t2.job_no = '$job_no'
	AND t2.target_line !=''
	UNION
	SELECT
	0 as total_lines,
	0 as total_translated,
	COUNT(t3.id) as total_completed
	FROM text_lines t3
	WHERE 1
	AND t3.job_no = '$job_no'
	AND t3.line_status = 'COMPLETE') t4				
SQL;
	
	$lines_array = array ();
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		
		$lines_array = array (
				'total_lines' => ($row [total_lines]),
				'total_translated' => ($row [total_translated]),
				'total_completed' => ($row [total_completed]) 
		);
	}
	
	return $lines_array;
}