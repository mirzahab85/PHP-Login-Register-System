<?php

session_start();
include('database.php');
include('includes/header-login.php');
include('includes/footer.php');
define('CSSPATH', 'css/styles.css/');
$err = "";

if (isset($_POST['Login'])) {

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (isset($_POST['username']) && empty($_POST['username'])) {
    $user = '<p style="color:red"><strong>Username is empty</strong></p>';
  }

  if (isset($_POST['password']) && empty($_POST['password'])) {
    $pass = '<p style="color:red"><strong>Password is empty</strong></p>';
  }

  if (!empty($username) && !empty($password)) {
    $sql = "SELECT * FROM register WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $hashedPasswordCheck = password_verify($password, $row['password']);

    if ($hashedPasswordCheck) {

      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      header('Location: index.php');
    } else {
      $err = '<p style="color:red"><strong>Username or password incorrect!</strong></p>';
    }
  }
}

?>

<div class="login">
  <div class="row">
    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label id="icon" for="name"><i class="icon-user"></i></label>
      <input type="text" name="username" id="username" placeholder="Username" />
      <?php if (isset($user)) echo $user;
      else if (isset($user1)) echo $user1 ?>
      <br><br>
      <label id="icon" for="name"><i class="icon-shield"></i></label>
      <input type="password" name="password" id="password" placeholder="Password" />
      <?php if (isset($pass)) echo $pass;
      else if (isset($pass1)) echo $pass1; ?>
      <input type="submit" value="Login" name="Login" />
    </form>
    <?php if (isset($err)) echo $err;
    if (isset($_SESSION['success'])) echo $_SESSION['success']; ?>
  </div>
</div>