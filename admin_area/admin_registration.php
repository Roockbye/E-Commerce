<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../static/css/admin_login.css">
</head>
<body>
    <div class="container">
    <div class="col-lg-3 col-md-2"></div>
    <div class="col-lg-6 col-md-8 login-box">
      <div class="col-lg-12 login-key">
        <i class="fa fa-key" aria-hidden="true"></i>
      </div>
      <div class="col-lg-12 login-title">
        ADMIN REGISTRATION
      </div>
    
      <div class="col-lg-12 login-form">
        <form method="POST" action="">
          <div class="form-group">
            <label for="admin_username" class="form-control-label">Username</label>
            <input type="text" id="admin_username" name="admin_username" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label for="admin_email" class="form-control-label">Email</label>
            <input type="email" id="admin_email" name="admin_email" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label for="admin_password" class="form-control-label">Password</label>
            <input type="password" id="admin_password" name="admin_password" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label for="conf_admin_password" class="form-control-label">Confirm Password</label>
            <input type="password" id="conf_admin_password" name="conf_admin_password" required="required" class="form-control">
        </div>
                <div class="col-lg-12 login-btm login-button">
                    <input type="submit" class="btn btn-outline-primary" name="admin_registration" value="Register">
                    <p class="register-link">Do you already have an account ?<a href="admin_login.php">Login</a></p>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['admin_registration'])) {
    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['conf_admin_password'];

    //select query
    $select_query = "SELECT * FROM admin_table WHERE admin_name='$admin_username' OR admin_email='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Le nom d'utilisateur et l'email existent déjà')</script>";
    } else if ($admin_password != $conf_admin_password) {
        echo "<script>alert('Le mot de passe ne correspond pas')</script>";
    } else {
    //insert_query
        $insert_query = "INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$admin_username', '$admin_email', '$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);
    }
    
    if ($rows_count > 0) {
        $_SESSION['username'] = $admin_username;
        echo "<script>alert('Register ok')</script>";
    } else {
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>