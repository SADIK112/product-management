<?php

  session_start();

    $message ='';
    require_once './productInfo.php';
    
    $product = new Product();
    

    if(isset($_SESSION['message'])){
        
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }

    if(isset($_GET['delete'])){
        
        $id = $_GET['delete'];
        $message = $product -> delete_product_info($id);
    }

    $query_result = $product -> select_all_product_info(); 

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        
        .trash{
            background: #d34e4e;
            transition: all .3s ease-in-out;
        }
        .trash:hover{
            background: red;
        }
    </style>

    <title>Shop</title>
  </head>
  <body>
        
 <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">BUY.COM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Category</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    
    <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Shop From Here</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="Product.php" class="btn btn-primary my-2">Add Product</a>
            <a href="view_product.php" class="btn btn-secondary my-2">View Product</a>
          </p>
        </div>
    </section>
  
<div class="container">
    <div class="row">
        <div class="col-md-12 col-ms-12">
            <h1><?php echo $message; ?></h1>
        </div>
    </div>
</div>
   
<div class="container">
    <div class="row">
        <div class="col-md-12 col-ms-12">
            <div class="well">      
                <table class="table table-borderd table-hover">
                    <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Category</th>
                        <th>Product Description</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php while($product_info = mysqli_fetch_assoc($query_result)){ ?>
                        <tr>
                            <td><?php echo $product_info['product_id']; ?></td>
                            <td><?php echo $product_info['product_name']; ?></td>
                            <td><?php echo $product_info['product_price']; ?></td>
                            <td><?php echo $product_info['product_quantity']; ?></td>
                            <td><?php echo $product_info['product_category']; ?></td>
                            <td><?php echo $product_info['product_description']; ?></td>
                            <td>
                                 <a href="edit_product.php?id=<?php echo $product_info['product_id']; ?>" class="btn btn-info" role="button">Edit</a>
                                 <a href="?delete=<?php echo $product_info['product_id']; ?>" class="btn btn-info trash" role="button">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                </div>
                
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>