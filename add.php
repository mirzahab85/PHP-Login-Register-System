<?php

session_start();
include ('database.php');
include ('includes/header-login.php');

if (isset($_POST['Add'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $target = "images/".basename($_FILES['image']['name'])."/";
    $image = $_FILES['image']['name'];

    if (empty($first_name))
    {
        $error_first_name = '<p style="color:red"><strong>First Name is required</strong></p>';
    }
    if (empty($last_name))
    {
        $error_last_name = '<p style="color:red"><strong>Last Name is required</strong></p>';
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

    if (empty($image)) {
      $image_error = '<p style="color:red"><strong>Please upload your photo.</strong></p>';
    }

    else if (strpos($email, '@') == false)
    {
        $error_email2 = '<p style="color:red"><strong>Invalid e-mail</strong></p>';
    }

    else
        {

            $sql = "INSERT INTO user (first_name,last_name,email, address, phone, image) VALUES ('$first_name','$last_name','$email','$address', '$phone', '$image')";

            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
              $msg = "Image uploaded successfully";
            } else {
              $msg = "There was a problem uploading image";
            }

            if (mysqli_query($conn, $sql)) {
              $_SESSION['success'] = '<p style="color:green"><strong>You have been successfully registered. Please log in.</strong></p>'; 
              header('Location: index.php');  
            }
            else 
              $fail = '<p style="color:red"><strong>ERROR: Could not able to execute' . $sql . mysqli_error($conn) . '</strong></p>';
        }
}

if (isset($_POST['Cancel'])) {
  header("Location: index.php");
}



?>

<div class="add">
  <h1><strong>Add a contact</strong></h1>
  <form action="add.php" method="post" enctype="multipart/form-data" style="text-align:center;">	
  <label id="icon" for="name"><i class="fas fa-user"></i></label>
  <input type="text" name="first_name" id="first_name" placeholder="First name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>" />
  <?php if (isset($error_first_name)) echo $error_first_name; ?>
  <br>
  <label id="icon" for="name"><i class="fas fa-user"></i></label>
  <input type="text" name="last_name" id="last_name" placeholder="Last name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" />
  <?php if (isset($error_last_name)) echo $error_last_name; ?>
  <br>
  <label id="icon" for="name"><i class="icon-envelope "></i></label>
  <input type="text" name="email" id="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" />
  <?php if (isset($error_email1)) echo $error_email1;
else if (isset($error_email2)) echo $error_email2 ?>
  <br>
  <label id="icon" for="address"><i class="icon-location-arrow"></i></label>
  <input type="text" name="address" id="address" placeholder="Address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" />
  <?php if (isset($error_address)) echo $error_address ?>
  <br>
  <label id="icon" for="phone"><i class="icon-phone"></i></label>
  <input type="text" name="phone" id="address" placeholder="Phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" />
  <?php if (isset($error_phone)) echo $error_phone ?>
  <br><br>
  <input type="hidden" name="size" value="1000000">
  <input type="file" name="image" style="margin-left:65px;">
  <br>
  <input type="submit" value="Add" name="Add" />
  <input type="submit" value="Cancel" name="Cancel" />
  <br><br>
  </form>
  <br><br>
</div>
