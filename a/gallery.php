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
                <h1 class="text-danger">  Add Photos </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-12">
                    <label>Title Of Photo</label>
                    <input type="text" class="form-control"  placeholder="Name Of Lecture" name="title">
                  </div>
                    <div class="form-group col-md-12">
                    <label>Upload Photo</label>
                    <input type="file" class="btn btn-primary" name="u_image">
                    </div>
                <button type="submit" class="btn btn-warning col-md-offset-2" name="submit">Submit</button>
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
      $title = $_POST['title'];
      
      $image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$image");
      
      echo $insert_news = "INSERT INTO gallery (gallery_title,gallery_image) VALUES ('$title','$image')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have added a new photo !')</script>";
	   echo"<script>window.open('gallery.php','_self')</script>";
        }
  }  
    }
?>
