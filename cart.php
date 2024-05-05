<!-- connect file -->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
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
    <link rel="stylesheet" href="style.css" />
    <style> .cart_img { width: 80px; height: 80px; } </style>
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
                            <a class="nav-link" href="./user_area/user_registration.php">S'enregister</a>
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

        <!-- fourth child-table -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">
                    <!-- <thead>
                        <tr>
                            <th>Nom du produit</th>
                            <th>Image</th>
                            <th>Quantité</th>
                            <th>Prix total</th>
                            <th>Supprimer</th>
                            <th colspan="2">Opérations</th>
                        </tr>
                    </thead> -->

                    <!-- <tbody> -->
                        
        <!-- PHP code to display dynamic data -->
    <?php
        // global $con;
        $get_ip_add = getIPAddress();
        $total_price = 0;
        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
        $result = mysqli_query($con, $cart_query);

        $result_count = mysqli_num_rows($result);
            if($result_count > 0){
                echo "
                <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Image</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                    <th>Supprimer</th>
                    <th colspan='2'>Opérations</th>
                </tr>
                </thead>
                <tbody>
                ";

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
                            <td><img src="./admin_area/product_images/<?php echo $prduct_image1 ?>" alt="" class="cart_img"></td>
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
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                            <td>
                                <!-- <button class="btn btn-secondary px-3 mx-3">Mettre à jour</button> -->
                                <input type="submit" class="btn btn-secondary px-3 mx-3" value="Mettre à jour le panier" name="update_cart">
                                <!-- <button class="btn btn-secondary px-3 mx-3">Retirer</button> -->
                                <input type="submit" class="btn btn-secondary px-3 mx-3" value="Supprimer" name="remove_cart">
                            </td>
                        </tr>
    <?php
                }
            }
        } else {
            echo "<h2 style='text-align: center;'>Le panier est vide</h2>";
        }
    ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                <div class="d-flex mb-5">
    <?php
        $get_ip_add = getIPAddress();
        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_add'";
        $result = mysqli_query($con, $cart_query);

        $result_count = mysqli_num_rows($result);
            if($result_count > 0){
                echo "
                <h4 class='px-3'>Sous-totaux : <strong>$total_price €</strong></h4>
                    <input type='submit' class='btn btn-secondary px-3 mx-3' value='Continuer mes achats' name='continue_shopping'>
                    <button class='btn btn-secondary px-3'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Procéder au paiement</a></button>
                ";
            } else {
                echo "
                <input type='submit' class='btn btn-secondary px-3 mx-3' value='Continuer mes achats' name='continue_shopping'>
                ";
            }
            if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
            }
    ?>
                </div>
            </div>
        </div>
    </form>

    <!-- function to remove item -->
    <?php
    function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            if(isset($_POST['removeitem']) && is_array($_POST['removeitem'])){
                foreach($_POST['removeitem'] as $remove_id){
                    echo $remove_id;
                    $delete_query = "DELETE FROM cart_details WHERE product_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);

                    if($run_delete){
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
    }
    echo $remove_item = remove_cart_item();
    ?>

        <!-- last child -->
        <!-- include footer -->
        <?php include("./includes/footer.php") ?>
    </div>

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>