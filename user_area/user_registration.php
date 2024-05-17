<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcheteUnJeu.com</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css" /> -->
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Création du compte utilisateur</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Pseudo</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Entrez votre nom d'utilisateur" name="user_username" autocomplete="off" required />
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Entrez votre email" name="user_email" autocomplete="off" required />
                    </div>
                    <!-- photo de profil -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">Photo de profil</label>
                        <input type="file" id="user_image" class="form-control" name="user_image" />
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Mot de passe</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Choisissez un mot de passe" name="user_password" autocomplete="off" required />
                    </div>
                    <!-- confirm password -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirmation du mot de passe</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirmez votre mot de passe" name="conf_user_password" autocomplete="off" required />
                    </div>
                    <!-- address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Adresse</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Entrez votre adresse postale" name="user_address" autocomplete="off" required />
                    </div>
                    <!-- mobile -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Numéro de téléphone</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Entrez votre numéro de téléphone" name="user_contact" autocomplete="off" required />
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" class="btn btn-outline-success" value="S'inscrire" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Vous avez déjà un compte ? <a href="user_login.php"> Se connecter</a></p>
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