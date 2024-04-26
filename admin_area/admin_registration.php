<?php
//include('./includes/connect.php');
//include('./functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../static/css/index.css">
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../static/images/reg.png" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_username" class="form-label">Username</label>
                    <input type="text" id="admin_username" name="admin_username" placeholder="Enter your username" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">Email</label>
                    <input type="email" id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="conf_admin_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_admin_password" name="conf_admin_password" placeholder="Confirm your password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Do you already have an account ?<a href="admin_login.php">Login</a></p>
                </div>
            </form>
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