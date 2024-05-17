<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../static/css/admin.css">
</head>

<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
        <img src="../images/logo.png" alt="" class="logo">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='./admin_registration.php'>S'enregistrer</a>
                        </li>";
                    } else {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='./logout.php'>Déconnexion</a>
                        </li>";
                    }

                    if(!isset($_SESSION['username'])){
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='./admin_login.php'>Se connecter</a>
                        </li>";
                    } else {
                        echo "
                        <li class='nav-item'>
                            <span class='nav-link'>Bienvenue ".$_SESSION['username']."</span>
                        </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

        <div class="bg-light">
            <h3 class="text-center p-3">Tableau de Bord Administrateur</h3>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 bg-secondary p-3 text-center text-white">
                    <img src="../static/images/logo.jpg" alt="" class="admin-image">
                    <p class="mb-0">
                        <?php 
                            if(!isset($_SESSION['username'])){
                                echo "Invité";
                            } else {
                                echo "Bienvenue ".$_SESSION['username'];
                            }
                        ?>
                    </p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <div class="button">
                        <a href="index.php?insert_products" class="btn btn-info mr-2">Insérer un Produit</a>
                        <a href="index.php?view_products" class="btn btn-info mr-2">Voir les Produits</a>
                        <a href="index.php?insert_category" class="btn btn-info mr-2">Insérer une Catégorie</a>
                        <a href="index.php?view_categories" class="btn btn-info mr-2">Voir les Catégories</a>
                        <a href="index.php?insert_brand" class="btn btn-info mr-2">Insérer une Marque</a>
                        <a href="index.php?view_brands" class="btn btn-info mr-2">Voir les Marques</a>
                        <a href="index.php?list_orders" class="btn btn-info mr-2">Toutes les Commandes</a>
                        <a href="index.php?list_payments" class="btn btn-info mr-2">Tous les Paiements</a>
                        <a href="index.php?list_users" class="btn btn-info mr-2">Liste des Utilisateurs</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-3">

            <?php
                // Inclusion dynamique des différents éléments en fonction des paramètres GET
                if(isset($_GET['insert_products'])){
                  include('insert_product.php');
                }
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }
                if(isset($_GET['insert_brand'])){
                    include('insert_brands.php');
                }
                if(isset($_GET['view_products'])){
                    include('view_products.php');
                }
                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }
                if(isset($_GET['edit_users'])){
                    include('edit_users.php');
                }
                if(isset($_GET['delete_product'])){
                    include('delete_product.php');
                }
                if(isset($_GET['view_categories'])){
                    include('view_categories.php');
                }
                if(isset($_GET['view_brands'])){
                    include('view_brands.php');
                }
                if(isset($_GET['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_GET['edit_brands'])){
                    include('edit_brands.php');
                }
                if(isset($_GET['delete_category'])){
                    include('delete_category.php');
                }
                if(isset($_GET['delete_brands'])){
                    include('delete_brands.php');
                }
                if(isset($_GET['list_orders'])){
                    include('list_orders.php');
                }
                if(isset($_GET['list_payments'])){
                    include('list_payments.php');
                }
                if(isset($_GET['list_users'])){
                    include('list_users.php');
                }
            ?>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <?php include("../includes/footer.php") ?>
    </div>
    </div>
</body>
</html>
