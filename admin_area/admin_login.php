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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../static/css/index.css">
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
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
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1">You don't have an account ?<a href="admin_registration.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>