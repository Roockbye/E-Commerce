<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
    $product_tile=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    //accessing images tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    //checking empty condition
    if ($product_tile=='' ||
    $product_description=='' ||
    $product_keywords=='' ||
    $product_category=='' ||
    $product_brands=='' ||
    $product_image1=='' ||
    $product_image2=='' ||
    $product_image3=='' ||
    $product_price==''){
        echo "<script>alert('Veuillez remplir tous les champs du formulaire')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
        //insert query
        $insert_products="INSERT INTO products  (
            product_title, 
            product_description, 
            product_keywords, 
            category_id, 
            brand_id, 
            product_image1, 
            product_image2, 
            product_image3, 
            product_price, 
            date, 
            status) VALUES (
            '$product_tile',
            '$product_description',
            '$product_keywords',
            '$product_category',
            '$product_brands',
            '$product_image1',
            '$product_image2',
            '$product_image3',
            '$product_price',
            NOW(),
            '$product_status')";
        $result_query=mysqli_query($con, $insert_products);
        if($result_query){
            echo "<script>alert('Produit ajouté avec succès')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products / Jeux</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Nom du jeu</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Entrer nom du jeu" autocomplete="off" required>
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Entrer une description du jeu" autocomplete="off" required>
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Mots clés</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Entrer des mots clés" autocomplete="off" required>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Selectionnez une catégorie</option>
    <?php
    $select_query="SELECT * FROM categories";
    $result_query=mysqli_query($con, $select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $category_title=$row['category_title'];
        $category_id=$row['category_id'];
        echo "<option value='$category_id'>$category_title</option>";
    } 
    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Selectionnez une plateforme</option>
    <?php
    $select_query="SELECT * FROM brands";
    $result_query=mysqli_query($con, $select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $brand_title=$row['brand_title'];
        $brand_id=$row['brand_id'];
        echo "<option value='$brand_id'>$brand_title</option>";
    } 
    ?>
                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required>
            </div>
            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required>
            </div>
            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required>
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Prix</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Entrer un prix" autocomplete="off" required>
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-outline-success mb-2 px-2" value="Ajouter produit">
            </div>
        </form>
    </div>
</body>
</html>