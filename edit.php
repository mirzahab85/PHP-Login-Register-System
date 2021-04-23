<?php

session_start();

if (!isset($_SESSION['username'])) {
    exit('<p style="color:red"><strong>You must log in first.</strong></p>');
}

include('database.php');
include('includes/header-login.php');

$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['Update'])) {


    $id = $_GET['id'];
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    if (!empty($email) && !empty($first_name) && !empty($last_name) && !empty($address) && !empty($phone) && !empty($image)) {

        $sql = "UPDATE user SET email = '$email', first_name = '$first_name', last_name = '$last_name', address = '$address', phone = '$phone', image = '$image' WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);

        $success_message = 'Post successfully updated.';
        header('Location: index.php');
    } else {

        $error_message = '<p style="color:red"><strong>All fields are
required!</strong></p>';
    }
}

if (isset($_POST['Cancel'])) {
    header("Location: index.php");
}

include('includes/footer.php');

?>

<div class="edit-contact" style="margin-top: 50px;">

    <form action="" method="post" style="text-align:center;" enctype="multipart/form-data" >
    <h3>Edit a Contact</h3>
    <label id="icon" for="name"><i class="fas fa-user"></i></label>
    <input type="text" name="first_name" id="first_name" placeholder="First name" value="<?php echo $row['first_name']; ?>" />
    <br>
    <label id="icon" for="name"><i class="fas fa-user"></i></label>
    <input type="text" name="last_name" id="last_name" placeholder="Last name" value="<?php echo $row['last_name']; ?>" />
    <br>
    <label id="icon" for="name"><i class="icon-envelope "></i></label>
    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" />
    <br>
    <label id="icon" for="address"><i class="icon-location-arrow"></i></label>
    <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $row['address']; ?>" />
    <?php if (isset($error_address)) echo $error_address ?>
    <br>
    <label id="icon" for="phone"><i class="icon-phone"></i></label>
    <input type="text" name="phone" id="address" placeholder="Phone" value="<?php echo $row['phone']; ?>" />
    <br><br>
    <input type="hidden" name="size" value="1000000">
    <input type="file" name="image" style="margin-left:65px;">
    <br>
    <input type="submit" value="Update" name="Update" />
    <input type="submit" value="Cancel" name="Cancel" />
    <br><br>
    <?php if (isset($error_message)) echo $error_message; ?>
    </form>
    <br><br>
</div>