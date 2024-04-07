<!-- connect file -->
<?php
include('./includes/connect.php');
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
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="" class="logo">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">S'enregister</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Prix Total :</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Invité</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Se connecter</a>
                </li>
            </ul>
        </nav>

        <!-- third child -->
        <nav class="bg-light">
            <h3 class="text-center">MAGASIN</h3>
            <p class="text-center">POPULAIRES ET RECOMMANDÉS</p>
        </nav>

        <!-- third child -->
        <div class="row">
            <div class="col-md-10">
                <!-- products -->
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/antomino.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Antomino</h5>
                                <p class="card-text">
                                Atomino sur Amiga est un jeu de réflexion dans lequel vous devez construire des molécules à l'aide des atomes qui vous sont proposés. Les molécules que vous devez faire ne sont pas forcément réalistes, mais les atomes requérant une double, triple voire quadruple liaison ne vous facilitent pas la tâche !
                                </p>
                                <a href="#" class="btn btn-outline-success">Ajouter au panier</a>
                                <a href="#" class="btn btn-secondary">Voir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/darkman.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Darkman</h5>
                                <p class="card-text">
                                    Darkman sur Amiga est un jeu d'action/plates-formes tiré du film du même nom. Vous incarnez un super héros nommé Darkman et pouvez sauter, donner des coups de poing et de pied, ainsi que vous balancer à des cordes. Dans chaque niveau, notre ami doit battre le boss de fin pour accéder au niveau suivant.
                                </p>
                                <a href="#" class="btn btn-outline-success">Ajouter au panier</a>
                                <a href="#" class="btn btn-secondary">Voir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/dukenukem.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Duke Nukem</h5>
                                <p class="card-text">
                                Duke Nukem est un jeu d'action sur PC. Etes-vous prêt à devenir le plus grand nettoyeur d'aliens ? Des extraterrestres assoiffés de sang ont atterri à Los Angeles, la situation est critique et la race humaine est en voie de disparition. Sortez vos calibres et préparez-vous à détruire de l'alien visqueux à coups de bottes ou d'armes en tout genre pour sauver l'humanité.
                                </p>
                                <a href="#" class="btn btn-outline-success">Ajouter au panier</a>
                                <a href="#" class="btn btn-secondary">Voir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/faria.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Faria</h5>
                                <p class="card-text">
                                Faria est un jeu de rôle sur Nes faisant la part belle à l'action. Un puissant sorcier a enlevé la fille du roi. Vous avez voyagé depuis une terre lointaine pour répondre à l'appel du roi. Votre mission est bien évidemment de combattre le magicien et ses sbires pour sauver la princesse. Heureusement, plus de 70 items et armes différentes vous aideront dans cette quête.
                                </p>
                                <a href="#" class="btn btn-outline-success">Ajouter au panier</a>
                                <a href="#" class="btn btn-secondary">Voir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/scrapyarddog.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Scrapyard Dog</h5>
                                <p class="card-text">
                                Scrapyard Dog est un jeu d'action/aventure sur Lynx. Un gang a décidé de kidnapper le chien de notre ami Louis pour demander une rançon. Ainsi, vous devez aider Louis à vaincre les divers dangers des 15 niveaux qui l'attendent pour retrouver son animal préféré.
                                </p>
                                <a href="#" class="btn btn-outline-success">Ajouter au panier</a>
                                <a href="#" class="btn btn-secondary">Voir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/heimdall.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Heimdall</h5>
                                <p class="card-text">
                                Heimdall sur Amiga est un jeu de rôle basé sur la mythologie nordique. Selon la légende, Heimdall est un demi-dieu gardant le royaume d'Asgard de toute forme d'intrusion. Alors que le Ragnarok approche, les armes de défense ont été dérobées par Loki, le Dieu de la malice. Retrouvez les armes éparpillées sur trois continents et défendez le royaume coûte que coûte.
                                </p>
                                <a href="#" class="btn btn-outline-success">Ajouter au panier</a>
                                <a href="#" class="btn btn-secondary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sidebar -->
            <div class="col-md-2 bg-secondary p-0">
                <!-- brands to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-body-tertiary">
                        <a href="#" class="nav-link"><h5>Plateformes</h5></a>
                    </li>
    <?php 
    $select_brands="SELECT * FROM brands";
    $result_brands=mysqli_query($con, $select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];        
    
    while($row_data=mysqli_fetch_assoc($result_brands)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];

        echo "  <li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>
                </li> ";
    }
    ?>
                </ul>
                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-body-tertiary">
                        <a href="#" class="nav-link"><h5>Catégories</h5></a>
                    </li>
    <?php 
    $select_categories="SELECT * FROM categories";
    $result_categories=mysqli_query($con, $select_categories);
    // $row_data=mysqli_fetch_assoc($result_categories);
    // echo $row_data['category_title'];        
    
    while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];

        echo "  <li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
                </li> ";
    }
    ?>
                </ul>
            </div>
        </div>

        <!-- last child -->
        <div class="bg-body-tertiary text-center p-2">
            <p>© 2024 AcheteUnJeu.com. Tous droits réservés.</p>
        </div>
    </div>

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>