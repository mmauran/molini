<?php
require_once '../../conf/smarty-conf.php';
include '../../functions/common_functions.php';
include 'translate_functions.php';
require_once '../../libs/sentence_class/autoloader.php';

if ($_SESSION ['login'] == 1) {
	
	if ($_REQUEST ['job'] == "translate") {
		
		$smarty->assign ( 'page', "Translate" );
		$smarty->display ( 'translate/translate.tpl' );
	} 

	elseif ($_REQUEST ['job'] == "submit") {
		$_SESSION ['translate_session_array'] ['job_no'] = $_REQUEST ['job_no'];
		
		$info = select_all_data ( 'job_no', $_SESSION [translate_session_array] [job_no], 'job' );
		$count_array = get_job_count ( $_SESSION ['translate_session_array'] ['job_no'] );
		$translated = round ( ($count_array ['total_translated'] / $count_array ['total_lines']) * 100 );
		$completed = round ( ($count_array ['total_completed'] / $count_array ['total_lines']) * 100 );
		
		$_SESSION ['translate_session_array'] ['submit'] = 'true';
		$_SESSION ['translate_session_array'] ['job_name'] = $info ['job_name'];
		$_SESSION ['translate_session_array'] ['submit'] = 'true';
		$_SESSION ['translate_session_array'] ['translated_percentage'] = "$translated%";
		$_SESSION ['translate_session_array'] ['completed_percentage'] = "$completed%";
		$lines_array = lines_array ( $_SESSION ['translate_session_array'] );
		
		$smarty->assign ( 'lines_array', $lines_array );
		$smarty->assign ( 'job_array', $info );
		$smarty->assign ( 'translate_array', $_SESSION ['translate_session_array'] );
		$smarty->assign ( 'pending', "PENDING" );
		$smarty->assign ( 'complete', 'COMPLETE' );
		$smarty->assign ( 'fuzzy', 'FUZZY' );
		$smarty->assign ( 'page', "Translate" );
		$smarty->display ( 'translate/translate.tpl' );
	} 

	elseif ($_REQUEST ['job'] == "save") {
		
		echo json_encode ( save_line ( $_REQUEST ['line_id'], $_REQUEST ['target_line'] ) );
	} 

	elseif ($_REQUEST ['job'] == "save_source") {
		
		echo json_encode ( save_source_line ( $_REQUEST ['line_id'], $_REQUEST ['source_line'] ) );
	} 

	elseif ($_REQUEST ['job'] == "delete_line") {
		
		$info = select_all_data ( 'id', $_REQUEST [line_id], 'text_lines' );
		
		if (($info ['source_line'] != "") or ($info ['target_line'] != "")) {
			
			$array = array (
					'text' => ("Fail") 
			);
		} else {
			
			delete_record ( 'id', $_REQUEST [line_id], 'text_lines' );
			$array = array (
					'text' => ("Success") 
			);
		}
		
		echo json_encode ( $array );
	} elseif ($_REQUEST ['job'] == "change_status") {
		
		$info = select_all_data ( 'id', $_REQUEST [line_id], 'text_lines' );
		$button_name = strtoupper ( $_REQUEST ['button_name'] );
		
		if (strtolower ( $info ['line_status'] ) == $_REQUEST ['button_name']) {
			$array = array (
					'pending_add' => (""),
					'complete_add' => (""),
					'fuzzy_add' => (""),
					'pending_remove' => (""),
					'complete_remove' => (""),
					'fuzzy_remove' => (""),
					'unchanged' => ('true') 
			);
		} 

		elseif ($_REQUEST ['button_name'] == 'pending') {
			
			$line_data = array (
					'line_status' => "'$button_name'" 
			);
			
			update_data ( $line_data, 'text_lines', 'id', $_REQUEST [line_id] );
			
			$array = array (
					'pending_add' => ("btn-primary"),
					'complete_add' => ("btn-default"),
					'fuzzy_add' => ("btn-default"),
					'pending_remove' => ("btn-default"),
					'complete_remove' => ("btn-success"),
					'fuzzy_remove' => ("btn-warning"),
					'unchanged' => ('false') 
			);
		} 

		elseif ($_REQUEST ['button_name'] == 'complete') {
			$line_data = array (
					'line_status' => "'$button_name'" 
			);
			
			update_data ( $line_data, 'text_lines', 'id', $_REQUEST [line_id] );
			$array = array (
					'pending_add' => ("btn-default"),
					'complete_add' => ("btn-success"),
					'fuzzy_add' => ("btn-default"),
					'pending_remove' => ("btn-primary"),
					'complete_remove' => ("btn-default"),
					'fuzzy_remove' => ("btn-warning"),
					'unchanged' => ('false') 
			);
		} elseif ($_REQUEST ['button_name'] == 'fuzzy') {
			$line_data = array (
					'line_status' => "'$button_name'" 
			);
			
			update_data ( $line_data, 'text_lines', 'id', $_REQUEST [line_id] );
			$array = array (
					'pending_add' => ("btn-default"),
					'complete_add' => ("btn-default"),
					'fuzzy_add' => ("btn-warning"),
					'pending_remove' => ("btn-primary"),
					'complete_remove' => ("btn-success"),
					'fuzzy_remove' => ("btn-default"),
					'unchanged' => ('false') 
			);
		} else {
		}
		
		echo json_encode ( $array );
	} 

	elseif ($_REQUEST ['job'] == "dict_search_ta_wiktionary") {
		
		$search_text=trim($_REQUEST[search_text]);
		$ta_json = file_get_contents ( 'https://ta.wiktionary.org/w/api.php?action=parse&format=json&prop=text|revid|displaytitle&callback=?&page=' . $search_text );
		$ta_json2 = str_replace ( "/**/({", "{", "$ta_json" );
		$ta_json3 = str_replace ( "})", "}", "$ta_json2" );
		$ta_obj = json_decode ( $ta_json3, true );
		if (($ta_text = $ta_obj [parse] [text] ['*']) == null) {
			
			$job_no=$_SESSION[translate_session_array][job_no];
			$dict_data = array (
					'term' => "'$search_text'",
					'user_id' => "'$_SESSION[user_id]'",
					'job_no' => "'$job_no'"
					);
			
			insert_data($dict_data, 'dict');
			
			$result = 0;
			$add_wiki_text = '<strong>' . $search_text . '</strong> எனும் சொல் தமிழ் விக்சனரியில் இல்லை.
			இச்சொல்லை <strong><i> மொழினி</i></strong> தன்னகத்தே சேமிக்கிறது.
			இச்சொல்லை விக்சனரியில் சேர்ப்பதற்குக் கூடிய விரைவில் முயற்சியெடுக்கப்படும். நன்றி.
			<br />
			<br />
			<a href="https://ta.wiktionary.org/w/index.php?title=' . $search_text . '&action=edit&redlink=1" >இந்த இணைப்பில் நீங்களே சொல்லின் பொருளை விக்சனரியில் சேர்த்துவிடலாம். உங்கள் உதவியால் அனைவருக்கும் பயன் கிடைக்கும்.</a>
			<br />
			<br />
			எடுத்துக்காட்டு : <br /><br />
			<pre>
==ஆங்கிலம்==
===பெயர்ச்சொல்===
\'\'\'{{PAGENAME}}\'\'\'
# [[பந்து]]
# [[உருண்டை]]
		</pre>';
		} 

		else {
			$result = 1;
			$add_wiki_text = "";
		}
		
		$array = array (
				'result' => ($result),
				'text' => ($ta_text),
				'add_wiki_text' => ($add_wiki_text) 
		);
		
		echo json_encode ( $array );
	} 

	elseif ($_REQUEST ['job'] == "dict_search_en_wiktionary") {
		
		$en_json = file_get_contents ( 'https://en.wiktionary.org/w/api.php?action=parse&format=json&prop=text|revid|displaytitle&callback=?&page=' . $_REQUEST ['search_text'] );
		$en_json2 = str_replace ( "/**/({", "{", "$en_json" );
		$en_json3 = str_replace ( "})", "}", "$en_json2" );
		$en_obj = json_decode ( $en_json3, true );
		$en_text = $en_obj [parse] [text] ['*'];
		
		$array = array (
				'text' => ($en_text) 
		);
		
		echo json_encode ( $array );
	} 

	elseif ($_REQUEST ['job'] == "dict_search_molini_lookup") {
		
		if ($_REQUEST ['search_text'] == "") {
			$array = array (
					'text' => ("No words selected") 
			);
			
			echo json_encode ( $array );
		} 

		else {
			
			echo json_encode ( molini_lookup_array ( $_REQUEST ['search_text'], 0 ) );
		}
	} 

	elseif ($_REQUEST ['job'] == "dict_search_madura") {
		function httpGet($url) {
			$ch = curl_init ();
			
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			// curl_setopt($ch,CURLOPT_HEADER, false);
			
			$output = curl_exec ( $ch );
			
			curl_close ( $ch );
			return $output;
		}
		
		$out = httpGet ( "http://maduraonline.com/?find=$_REQUEST[search_text]" );
		$array = array (
				'text' => ($out) 
		);
		
		echo json_encode ( $array );
	} 

	else {
	}
} 

else {
	header ( 'Location: ../../index.php' );
}