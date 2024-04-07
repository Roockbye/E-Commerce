<?php
include('./includes/connect.php');

function getproducts()
{
    global $con;
    $select_query="SELECT * FROM products ORDER BY product_title";
    $result_query=mysqli_query($con, $select_query);
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "
        <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-outline-success'>Ajouter au panier</a>
                <a href='#' class='btn btn-secondary'>Voir plus</a>
            </div>
        </div>
        </div>
        ";
    }
}

function getbrands()
{
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];        

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        echo "  <li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link'>$brand_title</a>
                </li> ";
    }
}

function getcategories(){
    global $con;
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
}

// function view_details()
// {
//     global $con;
//     if (isset($_GET['product_id'])) {
//         if (!isset($_GET['category'])) {
//             if (!isset($_GET['brand'])) {
//                 $product_id = $_GET['product_id'];
//                 $select_query = "Select * from `products` where product_id=$product_id";
//                 $result_query = mysqli_query($con, $select_query);
//                 while ($row = mysqli_fetch_assoc($result_query)) {
//                     $product_id = $row['product_id'];
//                     $product_title = $row['product_title'];
//                     $product_description = $row['product_description'];
//                     $product_image1 = $row['product_image1'];
//                     $product_image2 = $row['product_image2'];
//                     $product_image3 = $row['product_image3'];
//                     $product_price = $row['product_price'];
//                     $category_id = $row['category_id'];
//                     $brand_id = $row['brand_id'];
//                     echo "<div class='col-md-4 mb-2'>
//                 <div class='card'>
//                 <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
//                 <div class='card-body'>
//                 <h5 class='card-title'>$product_title</h5>
//                 <p class='card-text'>$product_description</p>
//                 <p class='card-text'>Price: $product_price/-</p>
//                 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
//                 <a href='index.php' class='btn btn-secondary'>Go home</a>
//                 </div>
//                 </div>
//                 </div>
                
//                 <div class='col-md-8'>
//                 <div class='row'>
//                 <div class='col-md-12'>
//                 <h4 class='text-center text-info mb-5'>Related products</h4>
//                 </div>
//                 <div class='col-md-6'>
//                 <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
//                 </div>
//                 <div class='col-md-6'>
//                 <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
//                 </div>
//                 </div>
//                 </div>";
//                 }
//             }
//         }
//     }
// }
// function getIPAddress()
// {
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     } else {
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     return $ip;
// }
