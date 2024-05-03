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
    <title>Admin Dashboard</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
--><link rel="stylesheet" href="../static/css/admin.css">
</head>
<body>
    <div class="container-fluid p-0 nn">
        <nav class="navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"> 
                        </li>
                    </ul>
            </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
    <?php
        if(!isset($_SESSION['username'])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='./admin_registration.php'>S'enregister</a>
            </li>";
        } else {
            echo "
            <li class='nav-item'>
            
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
            <a class='nav-link' href='./logout.php'>Déconnexion</a>
            </li>";
        }
    ?>
            </ul>
        </nav>

        <!-- third child -->

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../static/images/logo.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center"><?php if(!isset($_SESSION['username'])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='#'>Invité</a>
            </li>";
        } else {
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='#'>Bienvenue ".$_SESSION['username']."</a>
            </li>";
        } ?></p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payment</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                </div>
                <div class="button text-center">
                </div>
            </div>
        </div>



        <div class="container my-3">
            <?php
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

        <!--<div class="bg-info p-3 text-center footer">
            <p>All rights reserved ©- Designed by MARMANDE Melanie and LANIC Gaelle</p>
        </div>-->
        <?php include("../includes/footer.php") ?>
    </div>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        --><script src="../static/js/admin.js"></script>
<aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
  <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
  <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
    <img class="rounded-pill img-fluid" width="65" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="">
    <div class="ms-2">
      <h5 class="fs-6 mb-0">
        <a class="text-decoration-none"> <?php if(!isset($_SESSION['username'])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='#'>Invité</a>
            </li>";
        } else {
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='#'>Bienvenue ".$_SESSION['username']."</a>
            </li>";
        } ?></a>
      </h5>
    </div>
  </div>

  <ul class="categories list-unstyled">
    <li class="">
      <i class="uil-setting"></i><a href="#"> Dashboard</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payment</a>
    </li>
    <li class="">
      <i class="uil-setting"></i><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a>
    </li>
  </ul>
</aside>

<section id="wrapper">
  <nav class="navbar navbar-expand-md">
    <div class="container-fluid mx-2">
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="uil-bars text-white"></i>
        </button>
        <a class="navbar-brand" href="#">admin<span class="main-color">Dashboard</span></a>
      </div>
      <div class="collapse navbar-collapse" id="toggle-navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Settings
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item"><?php
        if(!isset($_SESSION['username'])){
            echo "
            <li class='nav-item'>
            <a class='nav-link' href='./admin_registration.php'>S'enregister</a>
            </li>";
        } else {
            echo "
            <li class='nav-item'>
            
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
            <a class='nav-link' href='./logout.php'>Déconnexion</a>
            </li>";
        }
    ?></a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i data-show="show-side-navigation1" class="uil-bars show-side-btn"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="p-4">
    <div class="welcome">
      <div class="content rounded-3 p-3">
        <h1 class="fs-3">Welcome to Dashboard</h1>
      </div>
    </div>

    <section class="statistics mt-4">
      <div class="row">
        <div class="col-lg-4">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-envelope-shield fs-2 text-center bg-primary rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0">1,245</h3> <span class="d-block ms-2">Emails</span>
              </div>
              <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
            <i class="uil-file fs-2 text-center bg-danger rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0">34</h3> <span class="d-block ms-2">Projects</span>
              </div>
              <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="box d-flex rounded-2 align-items-center p-3">
            <i class="uil-users-alt fs-2 text-center bg-success rounded-circle"></i>
            <div class="ms-3">
              <div class="d-flex align-items-center">
                <h3 class="mb-0">5,245</h3> <span class="d-block ms-2">Users</span>
              </div>
              <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="charts mt-4">
      <div class="row">
        <div class="col-lg-6">
          <div class="chart-container rounded-2 p-3">
            <h3 class="fs-6 mb-3">Chart title number one</h3>
            <canvas id="myChart"></canvas>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="chart-container rounded-2 p-3">
            <h3 class="fs-6 mb-3">Chart title number two</h3>
            <canvas id="myChart2"></canvas>
          </div>
        </div>
      </div>
    </section>

    <section class="admins mt-4">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <!-- <h4>Admins:</h4> -->
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill" width="75" height="75" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148906966/small/1501685402/enhance" alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill" width="75" height="75" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907137/small/1501685404/enhance" alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3">
              <div class="img">
                <img class="img-fluid rounded-pill" width="75" height="75" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907019/small/1501685403/enhance" alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <!-- <h4>Moderators:</h4> -->
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill" width="75" height="75" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907114/small/1501685404/enhance" alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3 mb-4">
              <div class="img">
                <img class="img-fluid rounded-pill" width="75" height="75" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907086/small/1501685404/enhance" alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
            <div class="admin d-flex align-items-center rounded-2 p-3">
              <div class="img">
                <img class="img-fluid rounded-pill" width="75" height="75" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="admin">
              </div>
              <div class="ms-3">
                <h3 class="fs-5 mb-1">Joge Lucky</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="statis mt-4 text-center">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-primary p-3">
            <i class="uil-eye"></i>
            <h3>5,154</h3>
            <p class="lead">Page views</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <div class="box bg-danger p-3">
            <i class="uil-user"></i>
            <h3>245</h3>
            <p class="lead">User registered</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
          <div class="box bg-warning p-3">
            <i class="uil-shopping-cart"></i>
            <h3>5,154</h3>
            <p class="lead">Product sales</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box bg-success p-3">
            <i class="uil-feedback"></i>
            <h3>5,154</h3>
            <p class="lead">Transactions</p>
          </div>
        </div>
      </div>
    </section>

    <section class="charts mt-4">
      <div class="chart-container p-3">
        <h3 class="fs-6 mb-3">Chart title number three</h3>
        <div style="height: 300px">
          <canvas id="chart3" width="100%"></canvas>
        </div>
      </div>
    </section>
  </div>
</section>
</body>
</html>

