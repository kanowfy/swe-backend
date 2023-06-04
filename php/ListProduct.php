<?php

session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <title>
    Library
    
    
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSS Reset -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css"/>
      


     <link rel="stylesheet" href = "css/style.css">
    


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script >
$(document).ready(function(){

  if ($(window).width() > 800) $("#product-table").DataTable();
  else{
    $("#product-table").DataTable({
      responsive: true
  });
  }
  
  $("#product-table_length").addClass("text-white");
  $("#product-table_filter label").prepend("Filter or ");
  $("#product-table_filter label").addClass("text-white");
  $("#product-table_info").addClass("text-white");

  $("#product-table_filter label input").attr("placeholder", "name of product");
  });
  
  
  
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>

  </head>

 <body>
      
                     <nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="ListProduct.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="ListProduct.php">Search Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="AddProduct.php">Add Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="EditBook.html">Update Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Order ?</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link text-white" href="#">AboutUs</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

   <div class="container">
        <h1 class="text-light text-center pt-5 pb-5">List of Products</h1>
          <!-- <div class="form-group row justify-content-end">
            <label for="search-filter" class="col-sm-4 col-form-label text-light text-right">Search or Filter by</label>
            <div class="col-sm-6">
                <input type="text" class="form-control text-center" id="search-filter" placeholder="any entry of any column like name, author etc">
            </div>
        </div>-->
           
    </div>
	    <?php require("controllers/ListProduct.php");?>   
  </body>
</html>


