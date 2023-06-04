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
		
		
    <div class='container-fluid my-container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Add a new Product</h2>
            <hr/>
            <form id='addProduct-form' class='mt-4 needs-validation' method='post' action='controllers/Add_Product.php' novalidate>
    <div class='form-group row'>
        <label for='productName' class='col-md-2 offset-md-2'>Product Name:</label>
        <input class='form-control col-md-4 ml-1' type='text' id='name' name='name' required>
    </div>
   
    <div class='form-group row'>
        <label for='description' class='col-md-2 offset-md-2'>Description:</label>
        <input class='form-control col-md-4 ml-1' type='text' id='description' name='description' required>
    </div>
   
    <div class='form-group row'>
        <label for='image' class='col-md-2 offset-md-2'>Image:</label>
        <input class='form-control col-md-4 ml-1' type='text' id='image' name='image' required>
    </div>
	
	<div class='form-group row'>
    <label for='category' class='col-md-2 offset-md-2'>Category:</label>
    <select class='form-control col-md-4 ml-1' id='category' name='category'>
        <option value='ice_cream'>Ice Cream</option>
        <option value='soda'>Soda</option>
    </select>
</div>

<div class='form-group row'>
    <label for='variations' class='col-md-2 offset-md-2'>Variations:</label>
    <input class='form-control col-md-4 ml-1' type='text' id='variations' name='variations' required>
</div>
<div class='form-group row'>
    <label for='prices' class='col-md-2 offset-md-2'>Prices:</label>
    <input class='form-control col-md-4 ml-1' type='text' id='prices' name='prices' required>
</div>
    <div class='col-md-4 offset-md-4'>
        <div class='d-flex justify-content-between'>
            <button type='submit' class='btn btn-primary'>Add New Product</button>
            <button type='button' onclick='location.href="product-listing.php";' class='btn btn-danger'>Go Back</button>
        </div>
    </div>
</form>
            
           
        </div>
    
    
    </div>


 <footer id="footer" class="bg-dark text-white py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3">
        <img id="hust-png" src="./images/hust.png" alt="hust-img" style="width: 100px;">
      </div>
      <div class="col-12 col-md-6">
        <div class="title">TA QUANG BUU LIBRARY</div>
        <div class="title">HANOI UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
        <div class="subtitle">Address: No1, Dai Co Viet, Ha Ba Trung, Ha Noi</div>
        <div class="subtitle">Phone number: (84-24) 3869 2243</div>
      </div>
      <div class="col-12 col-md-3">
        <div class="title">SOCIAL NETWORK</div>
        <div class="row">
          <div class="col-6">
            <a href="https://www.facebook.com" target="_blank">
              <img src="https://1000logos.net/wp-content/uploads/2021/04/Facebook-logo.png" class="img-fluid" style="width:50%;" />
            </a>
          </div>
          <div class="col-6">
            <a href="https://www.facebook.com" target="_blank">
              <img src="https://1000logos.net/wp-content/uploads/2021/04/Facebook-logo.png" class="img-fluid" style="width:50%;" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

          
  </body>
</html>