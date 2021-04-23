<?php 

session_start();

if(!isset($_SESSION['username'])){
	exit('<p style="color:red"><strong>You must log in first.</strong></p>');
}

session_destroy();

header("location: login.php");
exit();

?>