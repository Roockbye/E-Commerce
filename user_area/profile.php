<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcheteUnJeu.com</title>
    <!-- bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css" />
    <style>
    body { overflow-x: hidden; } 
    .profile_img { width: 90%; object-fit: contain; margin: auto; display: block;}
    .edit_img { width: 100px; height: 100px; object-fit: contain; }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/logo.png" alt="Logo" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fas fa-shopping-cart"></i>
                                <sup><?php cart_item(); ?></sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Prix Total : <?php total_cart_price(); ?>€</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="search_data">
                        <button class="btn btn-outline-success" type="submit" name="search_data_product">Rechercher</button>
                    </form>

                    <ul class="navbar-nav">
                        <?php if (!isset($_SESSION['username'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Invité</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./user_area/user_registration.php">S'enregistrer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./user_area/user_login.php">Se connecter</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./user_area/profile.php">
                                    <i class="fas fa-user-circle me-1"></i> Bienvenue <?php echo $_SESSION['username']; ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Déconnexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <!-- third child -->
        <div class="container">
            <nav class="p-4 mb-4">
                <div class="text-center">
                    <h3 class="fw-bold text-uppercase mb-3">Boutique en ligne</h3>
                    <p class="lead mb-0">Découvrez nos produits populaires et recommandés</p>
                </div>
            </nav>
        </div>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav text-center" style="height:100vh">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><h4>Mon profil</h4></a>
                    </li>
    <?php
        $username = $_SESSION['username'];
        $user_image = "SELECT * FROM user_table WHERE username='$username'";
        $user_image = mysqli_query($con, $user_image); 
        $row_image = mysqli_fetch_array($user_image);
        $user_image = $row_image['user_image'];
        echo "
        <li>
            <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
        </li>
        ";
    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php">Commandes en attente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php?edit_account">Modifier mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php?my_orders">Mes commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php?delete_account">Supprimer mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 text-center">
        <?php 
        get_user_order_details(); 
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
            include('user_orders.php');
        }
        if(isset($_GET['delete_account'])){
            include('delete_account.php');
        }
        ?>
            </div>
        </div>

        <!-- last child -->
        <!-- include footer -->
        <?php include("../includes/footer.php") ?>
    </div>

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>