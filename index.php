<?php
if ($_REQUEST ['job'] == "logout") {
	unset($_SESSION['login']);
	header( 'Location: modules/index/index.php' ) ;
}

else{
   header( 'Location: modules/index/index.php' ) ;
}
?>