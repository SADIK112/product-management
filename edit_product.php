<?php

    $product_id = $_GET['id'];

    require_once './productInfo.php';

    $product = new Product();
    $query_result = $product -> select_product_info_by_id($product_id);

    $product_info = mysqli_fetch_assoc($query_result);

    if(isset($_POST['btn'])){
        
        $product -> update_product_info($_POST);
    }
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

    <title>Edit Product</title>
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
          <div class="row form_row">
              <div class="col-md-12 col-ms-12">
                  <div class="well">
                      <form action="" method="post">
                          <div class="form-group">
                            <label for="exampleInputname1">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputname1" aria-describedby="emailHelp" name="product_name" value="<?php echo  $product_info['product_name']; ?>" placeholder="Enter Name">
                              
                            <input type="hidden" class="form-control" id="exampleInputname1" aria-describedby="emailHelp" name="product_id" value="<?php echo  $product_info['product_id']; ?>" placeholder="Enter Name">
                          </div>
                          
                           <div class="form-group">
                            <label for="exampleInputprice1">Product Price</label>
                            <input type="text" class="form-control" id="exampleInputname1" aria-describedby="emailHelp" value="<?php echo  $product_info['product_price']; ?>" name="product_price" placeholder="Enter Price">
                          </div>
                           
                           <div class="form-group">
                            <label for="exampleInputquantity1">Product Quantity</label>
                            <input type="text" class="form-control" id="exampleInputname1" aria-describedby="emailHelp" value="<?php echo  $product_info['product_quantity']; ?>" name="product_quantity" placeholder="Enter Quantity">
                          </div>
                        
                           <div class="form-group">
                            <label for="exampleInputcategory1">Product Category</label>
                            <input type="text" class="form-control" id="exampleInputname1" aria-describedby="emailHelp" value="<?php echo  $product_info['product_category']; ?>" name="product_category" placeholder="Enter Category">
                          </div>
                          
                           <div class="form-group">
                            <label for="exampleFormControlTextarea1">Product Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="30" name="product_description" placeholder="Description"><?php echo  $product_info['product_description']; ?></textarea>
                          </div>
                          <button type="submit" id ="ourButton" class="btn btn-primary" name="btn" value="Update Product Info">Update Product</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>

      <div class="new" style="height:1000px"></div>

       <script>
        
            var button = document.getElementById("ourButton");

            button.addEventListener("click" , newHead);
            
            function newHead(){
                window.alert("<?php echo $message; ?>");
            }
        
      </script>
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"</script>
  </body>
</html>