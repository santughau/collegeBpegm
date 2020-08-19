<?php 
session_start();
require_once('../inc/db.php');
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{
?>
<?php require_once('inc/top.php')?> 
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
                <h1 class="text-danger">Add Notice  </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-12">
                    <label>Add Title</label>
                    <input type="text" class="form-control"  placeholder="Enter Title" name="title" required="required">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Written By</label>
                    <input type="text" class="form-control"  placeholder="Written By" name="author" required="required">
                  </div>
                    
                 <div class="form-group col-md-12">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                  </div>
                  <button type="submit" class="btn btn-warning col-md-offset-5" name="submit">Submit</button>
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
      $author = $_POST['author'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      
      if($content==''){
                echo "<script>alert('Enter Content')</script>";
                echo "<script>window.open('notic.php','_self')</script>";
                exit();
            }
      
      echo $insert_news = "INSERT INTO posts (post_title,post_date,post_author,post_content) VALUES ('$title',NOW(),'$author','$content')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have added a new notic !')</script>";
	   //echo"<script>window.open('notic.php','_self')</script>";
        }
  }  
    }
?>
