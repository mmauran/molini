<?php
require_once '../../conf/smarty-conf.php';
include '../../functions/common_functions.php';
require_once '../../libs/sentence_class/autoloader.php';
include 'create_job_functions.php';

if ($_SESSION ['login'] == 1) {
	if ($_REQUEST ['job'] == "create_job") {
		
		$list_data = array (
				'from_date' => ($from_date),
				'to_date' => ($to_date),
				'user_id' => ($_SESSION [user_id]) 
		);
		
		$job_array = job_array ( $list_data );
		$job_no = select_last_no ( 'job_no', 'job', '' ) + 1;
		$smarty->assign ( 'job_no', $job_no );
		$smarty->assign ( 'job_array', $job_array );
		$smarty->assign ( 'page', "Create Job" );
		$smarty->display ( 'create_job/create_job.tpl' );
	} 

	elseif ($_REQUEST ['job'] == "submit") {
		
		$source_text = addslashes ( $_POST ['source_text'] );
		$job_name = addslashes ( trim ( $_POST ['job_name'] ) );
		$current_time = date ( 'Y-m-d H:i:s' );
		$data = array (
				'job_no' => "'$_POST[job_no]'",
				'job_name' => "'$job_name'",
				'source_language' => "'$_POST[source_language]'",
				'target_language' => "'$_POST[target_language]'",
				'privacy' => "'$_POST[privacy]'",
				'break_by' => "'$_POST[break_by]'",
				'source_text' => "'$source_text'",
				'status' => "'CREATED'",
				'created' => "'$current_time'",
				'user_id' => "'$_SESSION[user_id]'" 
		);
		insert_data ( $data, 'job' );
		
		if ($_POST [break_by] == 'POEM MODE') {
			$source_text = trim ( $source_text );
			$text_poem_data = array (
					'job_no' => "'$_POST[job_no]'",
					'line_no' => "'1'",
					'para_no' => "'1'",
					'source_line' => "'$source_text'",
					'source_updated' => "'$current_time'",
					'line_status' => "'PENDING'",
					'original_user_id' => "'$_SESSION[user_id]'" 
			);
			
			if ($source_text != "") {
				insert_data ( $text_poem_data, 'text_lines' );
			} else {
			}
		} 

		else {
			
			$para_array = array_filter ( explode ( "\n", $_POST ['source_text'] ) );
			
			$i = 1;
			
			foreach ( $para_array as $para ) {
				
				if ($_POST [break_by] == 'PARAGRAPH') {
					$para = addslashes ( trim ( $para ) );
					$text_para_data = array (
							'job_no' => "'$_POST[job_no]'",
							'line_no' => "'$i'",
							'para_no' => "'$i'",
							'source_line' => "'$para'",
							'source_updated' => "'$current_time'",
							'line_status' => "'PENDING'",
							'original_user_id' => "'$_SESSION[user_id]'" 
					);
					
					if ($para != "") {
						insert_data ( $text_para_data, 'text_lines' );
					} else {
					}
				} 

				else {
					
					$Sentence = new Sentence ();
					$sentences = $Sentence->split ( $para );
					$x = 1;
					
					foreach ( $sentences as $line ) {
						
						$line = addslashes ( trim ( $line ) );
						$text_line_data = array (
								'job_no' => "'$_POST[job_no]'",
								'line_no' => "'$x'",
								'para_no' => "'$i'",
								'source_line' => "'$line'",
								'source_updated' => "'$current_time'",
								'line_status' => "'PENDING'",
								'original_user_id' => "'$_SESSION[user_id]'" 
						);
						
						if ($line != "") {
							insert_data ( $text_line_data, 'text_lines' );
						} else {
						}
						$x ++;
					}
				}
				$i ++;
			}
		}
		$list_data = array (
				'from_date' => ($from_date),
				'to_date' => ($to_date),
				'user_id' => ($_SESSION [user_id]) 
		);
		$job_array = job_array ( $list_data );
		
		$smarty->assign ( 'job_array', $job_array );
		$smarty->assign ( 'page', "Create Job" );
		$smarty->display ( 'create_job/create_job.tpl' );
	} 

	else {
		
		$smarty->display ( '../index/login.tpl' );
	}
} 

else {
	header ( 'Location: ../../index.php' );
}