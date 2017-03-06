<?php
// php7 Ready!
function insert_data($data, $table) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$columns = implode ( ", ", array_keys ( $data ) );
	$values = implode ( ", ", array_values ( $data ) );
	
	$sql = <<<SQL
	INSERT INTO $table ($columns) VALUES ($values)
SQL;
	
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
}
function update_data($data, $table, $key_column, $key_column_value) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$columns = array_keys ( $data );
	$values = array_values ( $data );
	$loop = '';
	for($i = 0; $i < count ( $data ); $i ++) {
		if ($i == 0) {
			$loop = $loop . "`$columns[$i]`=$values[$i]";
		} else {
			$loop = $loop . ", " . "`$columns[$i]`=$values[$i]";
		}
	}
	
	$sql = <<<SQL
		UPDATE $table SET
		$loop
		WHERE `$key_column`='$key_column_value'
SQL;
	
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
}
function select_all_data($key_column, $key_column_value, $table) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
	SELECT * FROM `$table` WHERE `$key_column`='$key_column_value'
			
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		
		return $row;
	}
}
function select_list_data($column, $table, $condition, $orderby) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
    SELECT `$column`
	FROM `$table`
	WHERE 1
	$condition		
	ORDER BY $orderby
SQL;
	
	$i = 0;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		$rows [$i] = $row [$column];
		
		$i ++;
	}
	
	return $rows;
	
}
function select_data($column, $table, $condition) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
    SELECT `$column` as result
	FROM `$table`
	WHERE 1
	$condition
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		return $row ['result'];
	}
	
}
function select_last_no($column, $table, $condition) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
    SELECT MAX(`$column`) as result
	FROM `$table`
	WHERE 1
	$condition
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		return $row ['result'];
	}
	
}
function delete_record($key_column, $key_column_value, $table) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
    DELETE FROM `$table` WHERE `$key_column`='$key_column_value'
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
}
function get_total($column, $key_column, $key_column_value, $table){
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
	SELECT SUM(`$column`) as total FROM `$table` WHERE `$key_column`='$key_column_value'
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
	
		return $row['total'];
	}
}
function check_record_exists($table, $key_column, $key_column_value){
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
	SELECT * FROM `$table` WHERE `$key_column`='$key_column_value'
SQL;
	
		
	$result = $db->query ( $sql );
	$num = mysqli_num_rows ( $result );
	
	if (! $result) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	else{
		return $num;
	}
	
	
}
//
function list_group_array($parent, $rand_no) {
	include 'conf/config.php';
	include 'functions/opendb.php';
	
	$sql = <<<SQL
    SELECT * FROM groups WHERE parent = '$parent' ORDER BY group_name ASC
	
SQL;
	
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}
	
	while ( $row = $result->fetch_assoc () ) {
		
		$lables = str_replace ( " ", "", $row ['lables'] );
		
		$lable_array = explode ( ",", $lables );
		
		$i = 1;
		
		while ( $i <= count ( $lable_array ) ) {
			
			$i ++;
			if ($i == 2) {
				$prefix = '|-';
			} elseif ($i == (count ( $lable_array ) + 1)) {
				$prefix = $prefix . '--|';
			} else {
				$prefix = $prefix . '---';
			}
		}
		
		$_SESSION ["grouplist_$rand_no"] = $_SESSION ["grouplist_$rand_no"] . '<option value="' . $row [group_name] . '">' . $prefix . $row [group_name] . '</option>';
		list_group_array ( $row [group_name], $rand_no );
	}
}
function get_num_name($num) {
	switch ($num) {
		case 1 :
			return 'one';
		case 2 :
			return 'two';
		case 3 :
			return 'three';
		case 4 :
			return 'four';
		case 5 :
			return 'five';
		case 6 :
			return 'six';
		case 7 :
			return 'seven';
		case 8 :
			return 'eight';
		case 9 :
			return 'nine';
	}
}
function num_to_words($number, $real_name, $decimal_digit, $decimal_name) {
	if ($number == 0)
		return 'Zero' . (($real_name == '') ? '' : ' ' . $real_name);
	if ($number >= 0) {
		$real = floor ( $number );
		$decimal = round ( $number - $real, $decimal_digit );
	} else {
		$real = ceil ( $number ) * (- 1);
		$number = abs ( $number );
		$decimal = $number - $real;
	}
	$decimal = ( int ) str_replace ( '.', '', $decimal );
	
	$unit_name [1] = 'thousand';
	$unit_name [2] = 'million';
	$unit_name [3] = 'billion';
	$unit_name [4] = 'trillion';
	
	$packet = array ();
	
	$number = strrev ( $real );
	$packet = str_split ( $number, 3 );
	
	for($i = 0; $i < count ( $packet ); $i ++) {
		$tmp = strrev ( $packet [$i] );
		$unit = $unit_name [$i];
		if (( int ) $tmp == 0)
			continue;
		$tmp_res = '';
		if (strlen ( $tmp ) >= 2) {
			$tmp_proc = substr ( $tmp, - 2 );
			switch ($tmp_proc) {
				case '10' :
					$tmp_res = 'ten';
					break;
				case '11' :
					$tmp_res = 'eleven';
					break;
				case '12' :
					$tmp_res = 'twelve';
					break;
				case '13' :
					$tmp_res = 'thirteen';
					break;
				case '15' :
					$tmp_res = 'fifteen';
					break;
				case '20' :
					$tmp_res = 'twenty';
					break;
				case '30' :
					$tmp_res = 'thirty';
					break;
				case '40' :
					$tmp_res = 'forty';
					break;
				case '50' :
					$tmp_res = 'fifty';
					break;
				case '70' :
					$tmp_res = 'seventy';
					break;
				case '80' :
					$tmp_res = 'eighty';
					break;
				default :
					$tmp_begin = substr ( $tmp_proc, 0, 1 );
					$tmp_end = substr ( $tmp_proc, 1, 1 );
					
					if ($tmp_begin == '1')
						$tmp_res = get_num_name ( $tmp_end ) . 'teen';
					elseif ($tmp_begin == '0')
						$tmp_res = get_num_name ( $tmp_end );
					elseif ($tmp_end == '0')
						$tmp_res = get_num_name ( $tmp_begin ) . 'ty';
					else {
						if ($tmp_begin == '2')
							$tmp_res = 'twenty';
						elseif ($tmp_begin == '3')
							$tmp_res = 'thirty';
						elseif ($tmp_begin == '4')
							$tmp_res = 'forty';
						elseif ($tmp_begin == '5')
							$tmp_res = 'fifty';
						elseif ($tmp_begin == '6')
							$tmp_res = 'sixty';
						elseif ($tmp_begin == '7')
							$tmp_res = 'seventy';
						elseif ($tmp_begin == '8')
							$tmp_res = 'eighty';
						elseif ($tmp_begin == '9')
							$tmp_res = 'ninety';
						
						$tmp_res = $tmp_res . ' ' . get_num_name ( $tmp_end );
					}
					break;
			}
			
			if (strlen ( $tmp ) == 3) {
				$tmp_begin = substr ( $tmp, 0, 1 );
				
				$space = '';
				if (substr ( $tmp_res, 0, 1 ) != ' ' && $tmp_res != '')
					$space = ' ';
				
				if ($tmp_begin != 0) {
					if ($tmp_begin != '0') {
						if ($tmp_res != '')
							$tmp_res = 'and' . $space . $tmp_res;
					}
					$tmp_res = get_num_name ( $tmp_begin ) . ' hundred' . $space . $tmp_res;
				}
			}
		} else
			$tmp_res = get_num_name ( $tmp );
		$space = '';
		if (substr ( $res, 0, 1 ) != ' ' && $res != '')
			$space = ' ';
		$res = $tmp_res . ' ' . $unit . $space . $res;
	}
	
	$space = '';
	if (substr ( $res, - 1 ) != ' ' && $res != '')
		$space = ' ';
	
	$res .= $space . $real_name . (($real > 1 && $real_name != '') ? 's' : '');
	
	if ($decimal > 0)
		$res .= ' ' . num_to_words ( $decimal, '', 0, '' ) . ' ' . $decimal_name . (($decimal > 1 && $decimal_name != '') ? 's' : '');
	return ucfirst ( $res );
}
function num_to_rupee($number) {
	$real_name = Rupee;
	$decimal_digit = 2;
	$decimal_name = Cent;
	
	$res = '';
	$real = 0;
	$decimal = 0;
	
	if ($number == 0)
		return 'Zero' . (($real_name == '') ? '' : ' ' . $real_name);
	if ($number >= 0) {
		$real = floor ( $number );
		
		$decimal = number_format ( $number - $real, 2 );
	} else {
		$real = ceil ( $number ) * (- 1);
		$number = abs ( $number );
		$decimal = $number - $real;
	}
	$decimal = ( int ) str_replace ( '.', '', $decimal );
	
	$unit_name [1] = 'thousand';
	$unit_name [2] = 'million';
	$unit_name [3] = 'billion';
	$unit_name [4] = 'trillion';
	
	$packet = array ();
	
	$number = strrev ( $real );
	$packet = str_split ( $number, 3 );
	
	for($i = 0; $i < count ( $packet ); $i ++) {
		$tmp = strrev ( $packet [$i] );
		$unit = $unit_name [$i];
		if (( int ) $tmp == 0)
			continue;
		$tmp_res = '';
		if (strlen ( $tmp ) >= 2) {
			$tmp_proc = substr ( $tmp, - 2 );
			switch ($tmp_proc) {
				case '10' :
					$tmp_res = 'ten';
					break;
				case '11' :
					$tmp_res = 'eleven';
					break;
				case '12' :
					$tmp_res = 'twelve';
					break;
				case '13' :
					$tmp_res = 'thirteen';
					break;
				case '15' :
					$tmp_res = 'fifteen';
					break;
				case '20' :
					$tmp_res = 'twenty';
					break;
				case '30' :
					$tmp_res = 'thirty';
					break;
				case '40' :
					$tmp_res = 'forty';
					break;
				case '50' :
					$tmp_res = 'fifty';
					break;
				case '70' :
					$tmp_res = 'seventy';
					break;
				case '80' :
					$tmp_res = 'eighty';
					break;
				default :
					$tmp_begin = substr ( $tmp_proc, 0, 1 );
					$tmp_end = substr ( $tmp_proc, 1, 1 );
					
					if ($tmp_begin == '1')
						$tmp_res = get_num_name ( $tmp_end ) . 'teen';
					elseif ($tmp_begin == '0')
						$tmp_res = get_num_name ( $tmp_end );
					elseif ($tmp_end == '0')
						$tmp_res = get_num_name ( $tmp_begin ) . 'ty';
					else {
						if ($tmp_begin == '2')
							$tmp_res = 'twenty';
						elseif ($tmp_begin == '3')
							$tmp_res = 'thirty';
						elseif ($tmp_begin == '4')
							$tmp_res = 'forty';
						elseif ($tmp_begin == '5')
							$tmp_res = 'fifty';
						elseif ($tmp_begin == '6')
							$tmp_res = 'sixty';
						elseif ($tmp_begin == '7')
							$tmp_res = 'seventy';
						elseif ($tmp_begin == '8')
							$tmp_res = 'eighty';
						elseif ($tmp_begin == '9')
							$tmp_res = 'ninety';
						
						$tmp_res = $tmp_res . ' ' . get_num_name ( $tmp_end );
					}
					break;
			}
			
			if (strlen ( $tmp ) == 3) {
				$tmp_begin = substr ( $tmp, 0, 1 );
				
				$space = '';
				if (substr ( $tmp_res, 0, 1 ) != ' ' && $tmp_res != '')
					$space = ' ';
				
				if ($tmp_begin != 0) {
					if ($tmp_begin != '0') {
						if ($tmp_res != '')
							$tmp_res = 'and' . $space . $tmp_res;
					}
					$tmp_res = get_num_name ( $tmp_begin ) . ' hundred' . $space . $tmp_res;
				}
			}
		} else
			$tmp_res = get_num_name ( $tmp );
		$space = '';
		if (substr ( $res, 0, 1 ) != ' ' && $res != '')
			$space = ' ';
		$res = $tmp_res . ' ' . $unit . $space . $res;
	}
	
	$space = '';
	if (substr ( $res, - 1 ) != ' ' && $res != '')
		$space = ' ';
	
	$res .= $space . $real_name . (($real > 1 && $real_name != '') ? 's' : '');
	
	if ($decimal > 0)
		$res .= ' ' . num_to_words ( $decimal, '', 0, '' ) . ' ' . $decimal_name . (($decimal > 1 && $decimal_name != '') ? 's' : '');
	return ucfirst ( $res );
}
function num_to_indian_rupee($number) {
	$no = round ( $number );
	$point = round ( $number - $no, 2 ) * 100;
	$hundred = null;
	$digits_1 = strlen ( $no );
	$i = 0;
	$str = array ();
	$words = array (
			'0' => '',
			'1' => 'one',
			'2' => 'two',
			'3' => 'three',
			'4' => 'four',
			'5' => 'five',
			'6' => 'six',
			'7' => 'seven',
			'8' => 'eight',
			'9' => 'nine',
			'10' => 'ten',
			'11' => 'eleven',
			'12' => 'twelve',
			'13' => 'thirteen',
			'14' => 'fourteen',
			'15' => 'fifteen',
			'16' => 'sixteen',
			'17' => 'seventeen',
			'18' => 'eighteen',
			'19' => 'nineteen',
			'20' => 'twenty',
			'30' => 'thirty',
			'40' => 'forty',
			'50' => 'fifty',
			'60' => 'sixty',
			'70' => 'seventy',
			'80' => 'eighty',
			'90' => 'ninety' 
	);
	$digits = array (
			'',
			'hundred',
			'thousand',
			'lakh',
			'crore' 
	);
	while ( $i < $digits_1 ) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor ( $no % $divider );
		$no = floor ( $no / $divider );
		$i += ($divider == 10) ? 1 : 2;
		if ($number) {
			$plural = (($counter = count ( $str )) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str [0]) ? ' and ' : null;
			$str [] = ($number < 21) ? $words [$number] . " " . $digits [$counter] . $plural . " " . $hundred : $words [floor ( $number / 10 ) * 10] . " " . $words [$number % 10] . " " . $digits [$counter] . $plural . " " . $hundred;
		} else
			$str [] = null;
	}
	$str = array_reverse ( $str );
	$result = implode ( '', $str );
	$points = ($point) ? "." . $words [$point / 10] . " " . $words [$point = $point % 10] : '';
	
	if ($points) {
		return $result . "Rupees  " . $points . " Paise";
	} else {
		return $result . "Rupees  ";
	}
}
function num_to_indian_rupee_old($number) {
	$real_name = '';
	$decimal_digit = 2;
	$decimal_name = Paise;
	
	$res = '';
	$real = 0;
	$decimal = 0;
	
	if ($number == 0)
		return 'Zero' . (($real_name == '') ? '' : ' ' . $real_name);
	if ($number >= 0) {
		$real = floor ( $number );
		
		$decimal = number_format ( $number - $real, 2 );
	} else {
		$real = ceil ( $number ) * (- 1);
		$number = abs ( $number );
		$decimal = $number - $real;
	}
	$decimal = ( int ) str_replace ( '.', '', $decimal );
	
	$unit_name [1] = 'thousand';
	$unit_name [2] = 'million';
	$unit_name [3] = 'billion';
	$unit_name [4] = 'trillion';
	
	$packet = array ();
	
	$number = strrev ( $real );
	$packet = str_split ( $number, 3 );
	
	for($i = 0; $i < count ( $packet ); $i ++) {
		$tmp = strrev ( $packet [$i] );
		$unit = $unit_name [$i];
		if (( int ) $tmp == 0)
			continue;
		$tmp_res = '';
		if (strlen ( $tmp ) >= 2) {
			$tmp_proc = substr ( $tmp, - 2 );
			switch ($tmp_proc) {
				case '10' :
					$tmp_res = 'ten';
					break;
				case '11' :
					$tmp_res = 'eleven';
					break;
				case '12' :
					$tmp_res = 'twelve';
					break;
				case '13' :
					$tmp_res = 'thirteen';
					break;
				case '15' :
					$tmp_res = 'fifteen';
					break;
				case '20' :
					$tmp_res = 'twenty';
					break;
				case '30' :
					$tmp_res = 'thirty';
					break;
				case '40' :
					$tmp_res = 'forty';
					break;
				case '50' :
					$tmp_res = 'fifty';
					break;
				case '70' :
					$tmp_res = 'seventy';
					break;
				case '80' :
					$tmp_res = 'eighty';
					break;
				default :
					$tmp_begin = substr ( $tmp_proc, 0, 1 );
					$tmp_end = substr ( $tmp_proc, 1, 1 );
					
					if ($tmp_begin == '1')
						$tmp_res = get_num_name ( $tmp_end ) . 'teen';
					elseif ($tmp_begin == '0')
						$tmp_res = get_num_name ( $tmp_end );
					elseif ($tmp_end == '0')
						$tmp_res = get_num_name ( $tmp_begin ) . 'ty';
					else {
						if ($tmp_begin == '2')
							$tmp_res = 'twenty';
						elseif ($tmp_begin == '3')
							$tmp_res = 'thirty';
						elseif ($tmp_begin == '4')
							$tmp_res = 'forty';
						elseif ($tmp_begin == '5')
							$tmp_res = 'fifty';
						elseif ($tmp_begin == '6')
							$tmp_res = 'sixty';
						elseif ($tmp_begin == '7')
							$tmp_res = 'seventy';
						elseif ($tmp_begin == '8')
							$tmp_res = 'eighty';
						elseif ($tmp_begin == '9')
							$tmp_res = 'ninety';
						
						$tmp_res = $tmp_res . ' ' . get_num_name ( $tmp_end );
					}
					break;
			}
			
			if (strlen ( $tmp ) == 3) {
				$tmp_begin = substr ( $tmp, 0, 1 );
				
				$space = '';
				if (substr ( $tmp_res, 0, 1 ) != ' ' && $tmp_res != '')
					$space = ' ';
				
				if ($tmp_begin != 0) {
					if ($tmp_begin != '0') {
						if ($tmp_res != '')
							$tmp_res = 'and' . $space . $tmp_res;
					}
					$tmp_res = get_num_name ( $tmp_begin ) . ' hundred' . $space . $tmp_res;
				}
			}
		} else
			$tmp_res = get_num_name ( $tmp );
		$space = '';
		if (substr ( $res, 0, 1 ) != ' ' && $res != '')
			$space = ' ';
		$res = $tmp_res . ' ' . $unit . $space . $res;
	}
	
	$space = '';
	if (substr ( $res, - 1 ) != ' ' && $res != '')
		$space = ' ';
	
	$res .= $space . $real_name . (($real > 1 && $real_name != '') ? 's' : '');
	
	if ($decimal > 0)
		$res .= ' ' . num_to_words ( $decimal, '', 0, '' ) . ' ' . $decimal_name . (($decimal > 1 && $decimal_name != '') ? 's' : '');
	return ucfirst ( $res );
}
function num_to_ringgit($number) {
	$real_name = 'Ringgit';
	$decimal_digit = 2;
	$decimal_name = 'Cent';
	
	$res = '';
	$real = 0;
	$decimal = 0;
	
	if ($number == 0)
		return 'Zero' . (($real_name == '') ? '' : ' ' . $real_name);
	if ($number >= 0) {
		$real = floor ( $number );
		
		$decimal = number_format ( $number - $real, 2 );
	} else {
		$real = ceil ( $number ) * (- 1);
		$number = abs ( $number );
		$decimal = $number - $real;
	}
	$decimal = ( int ) str_replace ( '.', '', $decimal );
	
	$unit_name [1] = 'thousand';
	$unit_name [2] = 'million';
	$unit_name [3] = 'billion';
	$unit_name [4] = 'trillion';
	
	$packet = array ();
	
	$number = strrev ( $real );
	$packet = str_split ( $number, 3 );
	
	for($i = 0; $i < count ( $packet ); $i ++) {
		$tmp = strrev ( $packet [$i] );
		$unit = $unit_name [$i];
		if (( int ) $tmp == 0)
			continue;
		$tmp_res = '';
		if (strlen ( $tmp ) >= 2) {
			$tmp_proc = substr ( $tmp, - 2 );
			switch ($tmp_proc) {
				case '10' :
					$tmp_res = 'ten';
					break;
				case '11' :
					$tmp_res = 'eleven';
					break;
				case '12' :
					$tmp_res = 'twelve';
					break;
				case '13' :
					$tmp_res = 'thirteen';
					break;
				case '15' :
					$tmp_res = 'fifteen';
					break;
				case '20' :
					$tmp_res = 'twenty';
					break;
				case '30' :
					$tmp_res = 'thirty';
					break;
				case '40' :
					$tmp_res = 'forty';
					break;
				case '50' :
					$tmp_res = 'fifty';
					break;
				case '70' :
					$tmp_res = 'seventy';
					break;
				case '80' :
					$tmp_res = 'eighty';
					break;
				default :
					$tmp_begin = substr ( $tmp_proc, 0, 1 );
					$tmp_end = substr ( $tmp_proc, 1, 1 );
					
					if ($tmp_begin == '1')
						$tmp_res = get_num_name ( $tmp_end ) . 'teen';
					elseif ($tmp_begin == '0')
						$tmp_res = get_num_name ( $tmp_end );
					elseif ($tmp_end == '0')
						$tmp_res = get_num_name ( $tmp_begin ) . 'ty';
					else {
						if ($tmp_begin == '2')
							$tmp_res = 'twenty';
						elseif ($tmp_begin == '3')
							$tmp_res = 'thirty';
						elseif ($tmp_begin == '4')
							$tmp_res = 'forty';
						elseif ($tmp_begin == '5')
							$tmp_res = 'fifty';
						elseif ($tmp_begin == '6')
							$tmp_res = 'sixty';
						elseif ($tmp_begin == '7')
							$tmp_res = 'seventy';
						elseif ($tmp_begin == '8')
							$tmp_res = 'eighty';
						elseif ($tmp_begin == '9')
							$tmp_res = 'ninety';
						
						$tmp_res = $tmp_res . ' ' . get_num_name ( $tmp_end );
					}
					break;
			}
			
			if (strlen ( $tmp ) == 3) {
				$tmp_begin = substr ( $tmp, 0, 1 );
				
				$space = '';
				if (substr ( $tmp_res, 0, 1 ) != ' ' && $tmp_res != '')
					$space = ' ';
				
				if ($tmp_begin != 0) {
					if ($tmp_begin != '0') {
						if ($tmp_res != '')
							$tmp_res = 'and' . $space . $tmp_res;
					}
					$tmp_res = get_num_name ( $tmp_begin ) . ' hundred' . $space . $tmp_res;
				}
			}
		} else
			$tmp_res = get_num_name ( $tmp );
		$space = '';
		if (substr ( $res, 0, 1 ) != ' ' && $res != '')
			$space = ' ';
		$res = $tmp_res . ' ' . $unit . $space . $res;
	}
	
	$space = '';
	if (substr ( $res, - 1 ) != ' ' && $res != '')
		$space = ' ';
	
	$res .= $space . $real_name . (($real > 1 && $real_name != '') ? 's' : '');
	
	if ($decimal > 0)
		$res .= ' ' . num_to_words ( $decimal, '', 0, '' ) . ' ' . $decimal_name . (($decimal > 1 && $decimal_name != '') ? 's' : '');
	return ucfirst ( $res );
}
function debug_to_console($data) {
	if (is_array ( $data ))
		$output = "<script>console.log( 'Debug Objects: " . implode ( ',', $data ) . "' );</script>";
	else
		$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	
	echo $output;
}
function tax_array() {
	include 'conf/config.php';
	include 'functions/opendb.php';

	$current_date=date('Y-m-d');
	
	$sql = <<<SQL
    SELECT *
	FROM taxes
	WHERE (start_date <= '$current_date' OR start_date='0000-00-00')
	AND (end_date >= '$current_date' OR end_date='0000-00-00')				
	ORDER BY order_number ASC
SQL;

	$i = 0;
	if (! $result = $db->query ( $sql )) {
		die ( 'There was an error running the query [' . $db->error . ']' );
	}

	while ( $row = $result->fetch_assoc () ) {
		$rows [$i] = $row;

		$i ++;
	}

	return $rows;

}