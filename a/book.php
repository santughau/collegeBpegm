<?php session_start(); 
require_once('../inc/db.php') ?>
<?php require_once('inc/top.php');
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{
?> 
</head>
<body>
<div id="wrapper">
    <?php require_once('inc/header.php')?> 

    <div class="container-fluid body-section">
        <div class="row">
            <div class="col-md-3">
                <?php require_once('inc/sidebar.php')?> 
            </div>
            <div class="col-md-8">
                <h1 class="text-danger">  Add Books </h1><hr>
                <form method="post" action="" >
                  <div class="form-group col-md-8">
                    <label>Name Of Book</label>
                    <input type="text" class="form-control"  placeholder="Name Of Lecture" name="name" required="required">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Book No</label>
                    <input type="text" class="form-control"  placeholder="Degisination" name="no" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Writer </label>
                    <input type="text" class="form-control"  placeholder="Department" name="writer" required="required">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Publication </label>
                    <input type="text" class="form-control"  placeholder="Subject" name="pub" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Price </label>
                    <input type="text" class="form-control"  placeholder="Qualification" name="price" required="required">
                  </div>
                  <button type="submit" class="btn btn-warning navbar-right" name="submit">Submit</button>
                </form>
            
            </div>
        </div>
    </div>
    <?php require_once('inc/footer.php')?> 
</div>  
</body>
    <script>
            CKEDITOR.replace( 'content' );
    </script>
 </html>
<?php
  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $no = $_POST['no'];
      $writer = $_POST['writer'];
      $pub = $_POST['pub'];
      $price = $_POST['price'];
      
  
      $insert_news = "INSERT INTO liberary (book_no,book_name,book_write,book_pub,book_price) VALUES ('$no','$name','$writer','$pub','$price')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have added a new book !')</script>";
	   echo"<script>window.open('book.php','_self')</script>";
        }
  }  
    }
?>
