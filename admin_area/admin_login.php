<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM admin_table WHERE admin_name = '$admin_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0) {
        if (password_verify($admin_password, $row_data['admin_password'])) {
            $_SESSION['username'] = $admin_username;
            echo "<script>alert('Connexion réussie')</script>";
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Informations d'identification invalides')</script>";
        }
    } else {
        echo "<script>alert('Informations d'identification invalides')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../static/css/admin_login.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-2"></div>
    <div class="col-lg-6 col-md-8 login-box">
      <div class="col-lg-12 login-key">
        <i class="fa fa-key" aria-hidden="true"></i>
      </div>
      <div class="col-lg-12 login-title">
        ADMIN LOGIN
      </div>

      <div class="col-lg-12 login-form">
        <form method="POST" action="">
          <div class="form-group">
            <label for="admin_username" class="form-control-label">Username</label>
            <input type="text" id="admin_username" name="admin_username" required="required" class="form-control">
          </div>
          <div class="form-group">
            <label for="admin_password" class="form-control-label">Password</label>
            <input type="password" id="admin_password" name="admin_password" required="required" class="form-control">
          </div>
          <div class="col-lg-12 login-btm login-button">
            <input type="submit" class="btn btn-outline-primary" name="admin_login" value="Login">
            <p class="register-link">You don't have an account ? <a href="admin_registration.php">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
