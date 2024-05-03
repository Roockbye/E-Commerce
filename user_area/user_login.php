<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcheteUnJeu.com</title>
    <link rel="stylesheet" href="../static/css/admin_login.css" />
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
      Connexion au compte utilisateur
      </div>

      <div class="col-lg-12 login-form">
        <form method="POST" action="">
          <div class="form-group">
                <label for="user_username" class="form-control-label">Pseudo</label>
                <input type="text" id="user_username" class="form-control" autocomplete="off" name="user_username" required/>
                    </div>
                    <div class="form-group">
                        <label for="user_password" class="form-control-label">Mot de passe</label>
                        <input type="password" id="user_password" class="form-control" autocomplete="off" name="user_password" required/>
                    </div>
                    <div class="col-lg-12 login-btm login-button">
                        <input type="submit" class="btn btn-outline-primary" value="Se connecter" name="user_login">
                        <p class="register-link">Pas encore de compte chez nous ? <a href="user_registration.php"> S'inscrire</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE username = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // if ($row_count > 0) {
    //     if (password_verify($user_password, $row_data['user_password'])) {
    //         echo "<script>alert('Connexion réussie')</script>";
    //     } else {
    //         echo "<script>alert('Informations d'identification invalides')</script>";
    //     }
    // } else {
    //     echo "<script>alert('Informations d'identification invalides')</script>";
    // }

    //cart items
    $select_query_cart = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Connexion réussie')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Connexion réussie')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Informations d'identification invalides')</script>";
        }
    } else {
        echo "<script>alert('Informations d'identification invalides')</script>";
    }
}
?>