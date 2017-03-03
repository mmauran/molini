<?php
$db = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
mysqli_set_charset($db,"utf8");
if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}