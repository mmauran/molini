<?php
function view_array($data) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
	SELECT
	text_lines.job_no as job_no,
	text_lines.source_line as source_line,
	text_lines.target_line as target_line,
	text_lines.para_no as para_no,
	job.break_by as break_by
	FROM text_lines
	JOIN job 
	ON job.job_no=text_lines.job_no
	WHERE 1
	AND text_lines.job_no = '$data[job_no]'
	ORDER BY text_lines.para_no, text_lines.line_no ASC
SQL;
	
	$i = 0;
	$source_text = "";
	$target_text = "";
	$array = array ();
	$para_no = 1;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		
		if ($row ['break_by'] == 'POEM MODE') {
			
			$source_text = "<pre>$row[source_line]</pre>";
			$target_text = "<pre>$row[target_line]</pre>";
		} else {
			if ($para_no == $row [para_no]) {
				$source_text = $source_text . $row ['source_line'];
				$target_text = $target_text . " " . $row ['target_line'];
			} else {
				$source_text = $source_text . "<br /><br />" . $row ['source_line'];
				$target_text = $target_text . "<br /><br />" . $row ['target_line'];
			}
		}
		
		$para_no = $row [para_no];
		$i ++;
	}
	
	$source_text_count = str_word_count ( str_replace ( '<br />', "", $source_text ) );
	$source_text_page = round ( $source_text_count / 450, 2 );
	$array = array (
			'job_no' => ($data [job_no]),
			'source_text' => ($source_text),
			'target_text' => ($target_text),
			'source_text_count' => ($source_text_count),
			'source_text_page' => ($source_text_page) 
	);
	return $array;
	
	include 'functions/closedb.php';
}