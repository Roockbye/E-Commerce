<!-- connect file -->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
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
    <style>
    .cart_img {
        width: 80px;
        height: 80px;
    }
    </style>
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Jeux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">S'enregister</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                    </ul>
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

        <!-- fourth child-table -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Nom du produit</th>
                            <th>Image</th>
                            <th>Quantité</th>
                            <th>Prix total</th>
                            <th>Tout supprimer</th>
                            <th colspan="2">Opérations</th>
                        </tr>
                    </thead>

                    <tbody>
        <!-- PHP code to display dynamic data -->
    <?php
        // global $con;
        $get_ip_add = getIPAddress();
        $total_price = 0;
        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
        $result = mysqli_query($con, $cart_query);
        
        while($row = mysqli_fetch_array($result)){
            $product_id = $row['product_id'];
            $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
            $result_products = mysqli_query($con, $select_products);
    
            while($row_product_price = mysqli_fetch_array($result_products)){
                $product_price = array($row_product_price['product_price']);
                $price_table = $row_product_price['product_price'];
                $prduct_title = $row_product_price['product_title'];
                $prduct_image1 = $row_product_price['product_image1'];
                $product_values = array_sum($product_price);
                $total_price += $product_values;
    ?>
                        <tr>
                            <td><?php echo $prduct_title ?></td>
                            <td><img src="./images/<?php echo $prduct_image1 ?>" alt="" class="cart_img"></td>
                            <td><input type="text" name="qty" class="form-input w-50"></td>
    <?php
        $get_ip_add = getIPAddress();
        if(isset($_POST['update_cart'])){
            $quantities = $_POST['qty'];
            $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add'";
            $result_products_quantity = mysqli_query($con, $update_cart);            
            $total_price = $total_price*$quantities;
        }
    ?>
                            <td><?php echo $price_table ?>€</td>
                            <td><input type="checkbox"></td>
                            <td>
                                <!-- <button class="btn btn-secondary px-3 mx-3">Mettre à jour</button> -->
                                <input type="submit" class="btn btn-secondary px-3 mx-3" value="Mettre à jour le panier" name="update_cart">
                                <button class="btn btn-secondary px-3 mx-3">Retirer</button>
                            </td>
                        </tr>
    <?php
                }
        }
    ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
                    <h4 class="px-3">Sous-totaux : <strong><?php echo $total_price ?>€</strong></h4>
                    <a href="index.php"><button class="btn btn-outline-success px-3">Continuer mes achats</button></a>
                    <a href="#"><button class="btn btn-secondary px-3 mx-3">Procéder au paiement</button></a>
                </div>
            </div>
        </div>
    </form>

        <!-- last child -->
        <!-- include footer -->
        <?php include("./includes/footer.php") ?>
    </div>

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>