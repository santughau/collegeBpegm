<?php 
session_start();
require_once('../inc/db.php');
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{
?>
<?php require_once('inc/top.php')?> 
<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $get_teacher = "SELECT * FROM liberary WHERE book_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
        
        $book_no = $row_teacher['book_no'];
        $book_name = $row_teacher['book_name'];
        $book_write = $row_teacher['book_write'];
        $book_pub = $row_teacher['book_pub'];
        $book_price = $row_teacher['book_price'];
        
        
    }
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
                <h1 class="text-danger">Edit Books </h1><hr>
                <form method="post" action="" >
                  <div class="form-group col-md-8">
                    <label>Name Of Book</label>
                    <input type="text" class="form-control"   name="name" required="required" value="<?php echo"$book_name";?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Book No</label>
                    <input type="text" class="form-control"   name="no" required="required" value="<?php echo"$book_no";?>">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Writer </label>
                    <input type="text" class="form-control"   name="writer" required="required" value="<?php echo"$book_write";?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Publication </label>
                    <input type="text" class="form-control"   name="pub" required="required" value="<?php echo"$book_pub";?>">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Price </label>
                    <input type="text" class="form-control"   name="price" required="required" value="<?php echo"$book_price";?>">
                  </div>
                  <button type="submit" class="btn btn-warning navbar-right" name="update">Update</button>
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
  if(isset($_POST['update'])){
      $ida = $id;
      $book_name = $_POST['name'];
      $book_no = $_POST['no'];
      $book_write = $_POST['writer'];
      $book_pub = $_POST['pub'];
      $book_price = $_POST['price']; 

      
      

       $insert_news = "update liberary set 
      book_no = '$book_no' ,
      book_name = '$book_name' ,
      book_write = '$book_write' ,
      book_pub = '$book_pub' ,
      book_price = '$book_price' 

      where book_id = '$ida'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
	   echo"<script>window.open('view_books.php','_self')</script>";
        }
    }
    }
?>
