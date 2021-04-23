<?php
session_start();
include ('database.php');
include ('includes/header-register.php');
include('includes/footer.php');

if (isset($_POST['Register']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $target = "images/".basename($_FILES['image']['name'])."/";
    $image = $_FILES['image']['name'];

    if (empty($firstname))
    {
        $error_firstname = '<p style="color:red"><strong>First Name is required</strong></p>';
    }

    if (empty($lastname))
    {
        $error_lastname = '<p style="color:red"><strong>Last Name is required</strong></p>';
    }

    if (empty($username))
    {
        $error_login = '<p style="color:red"><strong>Username is required</strong></p>';
    }

    if (empty($email))
    {
        $error_email1 = '<p style="color:red"><strong>Email is required</strong></p>';
    }

    if (empty($address))
    {
        $error_address = '<p style="color:red"><strong>Address is required</strong></p>';
    }

    if (empty($phone))
    {
        $error_phone = '<p style="color:red"><strong>Phone is required</strong></p>';
    }

    if (empty($_POST['password']))
    {
        $error_password1 = '<p style="color:red"><strong>Password is required</strong></p>';
    }

    if (empty($image)) {
      $image_error = '<p style="color:red"><strong>Please upload your photo.</strong></p>';
    }

    else if (strpos($email, '@') == false)
    {
        $error_email2 = '<p style="color:red"><strong>Invalid e-mail</strong></p>';
    }

    else if(strlen($_POST['password']) < 6)
    {
      $error_password2 = '<p style="color:red"><strong>Password must contain at least 6 characters.</strong></p>';
    }

    else
    {
        $checkUsername = "SELECT * FROM `register` WHERE username='" . $username . "'";
        $queryUsername = mysqli_query($conn, $checkUsername);

        $checkEmail = "SELECT * FROM `register` WHERE email='" . $email . "'";
        $queryEmail = mysqli_query($conn, $checkEmail);

        if (mysqli_num_rows($queryUsername) > 0) $unameExists = '<p style ="color:red"><strong>Username already exists.</strong></p>';
        else if (mysqli_num_rows($queryEmail) > 0) $emailExists = '<p style="color:red"><strong>Email already exists.</strong></p>';

        else
        {
            $sql = "INSERT INTO register (firstname,lastname,username,email,password, address, phone, image) VALUES ('$firstname','$lastname','$username','$email','$password', '$address', '$phone', '$image')";

            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
              $msg = "Image uploaded successfully";
            } else {
              $msg = "There was a problem uploading image";
            }

            if (mysqli_query($conn, $sql)) {
              $_SESSION['success'] = '<p style="color:green"><strong>You have been successfully registered. Please log in.</strong></p>'; 
              header('Location: login.php');  
            }
            else 
              $fail = '<p style="color:red"><strong>ERROR: Could not able to execute' . $sql . mysqli_error($conn) . '</strong></p>';

        }
    }

}

?>


<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="registration">
  <h1>Registration</h1>
  <form action="register.php" method="post" enctype="multipart/form-data" style="text-align:center;">	
  <label id="icon" for="name"><i class="fas fa-user-circle"></i></label>
  <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" />
  <?php if (isset($error_firstname)) echo $error_firstname ?>
  <br>
  <label id="icon" for="name"><i class="fas fa-user-circle"></i></label>
  <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
  <?php if (isset($error_lastname)) echo $error_lastname ?>
  <br>
  <label id="icon" for="name"><i class="icon-envelope "></i></label>
  <input type="text" name="email" id="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
  <?php if (isset($error_email1)) echo $error_email1;
else if (isset($error_email2)) echo $error_email2 ?>
  <br>
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="username" id="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" />
  <?php if (isset($error_login)) echo $error_login ?>
  <br>
  <label id="icon" for="address"><i class="icon-location-arrow"></i></label>
  <input type="text" name="address" id="address" placeholder="Address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" />
  <?php if (isset($error_address)) echo $error_address ?>
  <br>
  <label id="icon" for="phone"><i class="icon-phone"></i></label>
  <input type="text" name="phone" id="address" placeholder="Phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" />
  <?php if (isset($error_phone)) echo $error_phone ?>
  <br>
  <label id="icon" for="name"><i class="icon-shield"></i></label>
  <input type="password" name="password" id="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" /> 
  <?php if (isset($error_password1)) echo $error_password1; else if (isset($error_password2)) echo $error_password2; ?>
  <br>
  <input type="hidden" name="size" value="1000000">
  <input type="file" name="image" style="margin-left:65px;">
  <?php if (isset($image_error)) echo $image_error; ?>
  <br>
  <input type="submit" value="Register" name="Register" />
  <br><br>
  <?php if (isset($success)) echo $success;
else if (isset($fail)) echo $fail; ?>
  <?php if (isset($unameExists)) echo $unameExists;
else if (isset($emailExists)) echo $emailExists; ?>
  </form>
  <br><br>
</div>