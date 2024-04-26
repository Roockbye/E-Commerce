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
    <style>body { overflow-x: hidden; } .profile_img { width: 90%; object-fit: contain; margin: auto; display: block;}</style>

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Mon compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Prix Total : <?php total_cart_price(); ?>€</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-success" type="submit">Rechercher</button> -->
                        <input type="submit" value="Rechercher" class="btn btn-outline-success" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
    <?php
    cart();
    ?>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
    <?php
        if(!isset($_SESSION['username'])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='#'>Invité</a>
            </li>";
        } else {
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='#'>Bienvenue ".$_SESSION['username']."</a>
            </li>";
        }

        if(!isset($_SESSION['username'])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='./user_area/user_login.php'>Se connecter</a>
            </li>";
        } else {
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php'>Déconnexion</a>
            </li>";
        }
    ?>
            </ul>
        </nav>

        <!-- third child -->
        <nav class="bg-light">
            <h3 class="text-center">MAGASIN</h3>
            <p class="text-center">POPULAIRES ET RECOMMANDÉS</p>
        </nav>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav text-center" style="height:100vh">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><h4>Mon profil</h4></a>
                    </li>
                    <li>
                        <img src="../images/profil.jpg" class="profile_img my-4" alt="">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Commandes en attente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Modifier mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Mes commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Supprimer mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Déconnexion</a>
                    </li>
                </ul>
            <div class="col-md-10">
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