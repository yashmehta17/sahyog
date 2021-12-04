<?php 

session_start();
	if(!isset($_SESSION['sloggedin'])) {
		echo 123456;
		header("location: login.php");
		exit;	
	}
	session_abort();

?>