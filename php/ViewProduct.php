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


<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>

  </head>

 <body>
      
                 <nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="d-flex align-items-center" href="#">
      <img src="./images/hust.png" alt="hust-img" width="30" height="30" class="d-inline-block align-text-top me-2">
        <h5 class="mb-0 ml-1 text-warning">TA QUANG BUU LIBRARY</h5>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="LogIn.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="ListBook.html">Search Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="AddBook.html">Add Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="EditBook.html">Update Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Issue Book</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link text-white" href="#">AboutUs</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container-fluid h-100 my-5">
   
        <div class="row">
            <div class="col-md-5">
                <h3 class="text-light">Product Details</h3>
                <?php require('controllers/View_Product.php'); ?>
                <div class="d-flex my-3 justify-content-around">
                <a class="btn btn-primary" role="button" href="issue-receive-book?issue=1&name=<?=$shelf_book_name?>">Issue Product</a>
                <a class="btn btn-info" role="button" href="edit-book?name=<?=$shelf_book_name?>">Edit Product Info</a>
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteBookModalCenter">Delete Product</button>
                </div>
            </div>
           
		   </div>
    
	 <div class="modal fade" id="deleteBookModalCenter" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteBookModalLongTitle">Delete the Product '<?=urldecode($shelf_book_name)?>'?</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            Careful: Once this action has been taken, it cannot be reversed!
            <br><br>
            Proceed with deleting the book?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button id="#confirmDelete" type="button" onclick="deletetheBook()" class="btn btn-danger">Delete Product</button>
        </div>
        </div>
    </div>
    </div>
	</div>
  </body>
</html>


