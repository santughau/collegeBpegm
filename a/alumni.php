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
            <div class="col-md-5">
                <h1 class="text-danger">Add Alumni </h1><hr>
                <form method="post" action="" enctype="multipart/form-data" >
                  <div class="form-group col-md-12">
                    <label>Name Of Student</label>
                    <input type="text" class="form-control"  placeholder="Name Of ALumni Student" name="name" required="required">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Desiginationn</label>
                    <input type="text" class="form-control" name="deg" required="required">
                  </div>
                    <div class="form-group col-md-12">
                    <label>Upload Photo</label>
                    <input type="file" class="btn btn-primary" name="u_image" required="required">
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
      echo $name = $_POST['name'];
      $deg = $_POST['deg'];
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");
      
       $insert_news = "INSERT INTO alumni (alumni_name,alumni_design,alumni_image) VALUES ('$name','$deg','$u_image')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have added a new teacher !')</script>";
	  echo"<script>window.open('alumni.php','_self')</script>";
        }
  }  
    }
?>
