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
        <h2 class="text-center">Connexion au compte utilisateur</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Pseudo</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Entrez votre nom d'utilisateur" autocomplete="off" required name="user_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Mot de passe</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Entrez votre mot de passe" autocomplete="off" required name="user_password"/>
                    </div>
                    <div class="mb-4">
                        <input type="submit" class="btn btn-outline-success" value="Se connecter" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Pas encore de compte chez nous ? <a href="user_registration.php"> S'inscrire</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    //$user_ip=getIPAddress();
    if($row_count>0){
        if(password_verify($user_password,$row_data['user_password'])){
            echo "<script>alert('Login successful')</script>";
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
    //cart items
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Login successful')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Crdentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>