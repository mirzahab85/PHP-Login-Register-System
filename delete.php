<?php

session_start();

if (!isset($_SESSION['username'])) {
	exit('You must log in first!');
}

include('database.php');

$id = $_GET['id'];

$deletePost = mysqli_query($conn, "DELETE FROM user WHERE id=$id");

header("Location:index.php");
