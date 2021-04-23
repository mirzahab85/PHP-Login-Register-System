<!DOCTYPE html>
<html lang="EN">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<title> Home Page </title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>

	<div id="container" class="navigation" style="text-align:center">

		<ul>
			<?php

			if (isset($_SESSION['username'])) {
				echo '<li><a href="logout.php">Logout</a></li>';
				echo '<li><a href="profile.php?">Profile</a></li>';
				echo '<li><a href="index.php">Home</a></li>';
			} else {
				echo '<li><a href="register.php">Register</a></li>';
			}
			?>
		</ul>
	</div>

	</div>

