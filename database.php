<?php 

$servername = "localhost";
$login = "root";
$pass = "";
$dbname = "database";

//Connection to database 
$conn = mysqli_connect($servername, $login, $pass, $dbname);

//Check connection to database 
if (!$conn) {
	die("<p style='color:red'><strong>Connection failed: </strong></p>" . mysqli_connect_error());
}
	$database = '<p style="color:green"><strong>Database connecton successful. </strong></p>';
