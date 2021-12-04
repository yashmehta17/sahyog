<?php 

session_start();
	if(!isset($_SESSION['loggedin'])) {
		echo 123456;
		header("location: login.php");
		exit;	
	}
	session_abort();

?>