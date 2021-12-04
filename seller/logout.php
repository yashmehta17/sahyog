<?php
session_start();
session_unset();
$_SESSION['loggedin']=false;
if(session_destroy()){
header("location: login.php");
}
?>
