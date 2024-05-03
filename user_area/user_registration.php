<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcheteUnJeu.com</title>
    <link rel="stylesheet" href="../static/css/admin_login.css" />
</head>

<body>
<div class="container">
    <div class="col-lg-3 col-md-2"></div>
    <div class="col-lg-6 col-md-8 login-box">
      <div class="col-lg-12 login-key">
        <i class="fa fa-key" aria-hidden="true"></i>
      </div>
      <div class="col-lg-12 login-title">
        Création du compte utilisateur
      </div>

      <div class="col-lg-12 login-form">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user_username" class="form-control-label">Pseudo</label>
                <input type="text" id="user_username" class="form-control" name="user_username" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label for="user_email" class="form-control-label">Email</label>
                <input type="email" id="user_email" class="form-control" name="user_email" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label for="user_image" class="form-control-label">Photo de profil</label>
                <input type="file" id="user_image" class="form-control" name="user_image" />
            </div>
            <div class="form-group">
                <label for="user_password" class="form-control-label">Mot de passe</label>
                <input type="password" id="user_password" class="form-control" name="user_password" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label for="conf_user_password" class="form-control-label">Confirmation du mot de passe</label>
                <input type="password" id="conf_user_password" class="form-control" name="conf_user_password" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label for="user_address" class="form-control-label">Adresse</label>
                <input type="text" id="user_address" class="form-control" name="user_address" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label for="user_contact" class="form-control-label">Numéro de téléphone</label>
                <input type="text" id="user_contact" class="form-control" name="user_contact" autocomplete="off" required />
            </div>

                    <div class="col-lg-12 login-btm login-button">
                        <input type="submit" class="btn btn-outline-primary" value="S'inscrire" name="user_register">
                        <p class="register-link">Vous avez déjà un compte ? <a href="user_login.php"> Se connecter</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    //select query
    $select_query = "SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Le nom d'utilisateur et l'email existent déjà')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Le mot de passe ne correspond pas')</script>";
    } else {
    //insert_query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
    }

    //selecting cart items
    $select_cart_items = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Vous avez des articles dans votre panier')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>