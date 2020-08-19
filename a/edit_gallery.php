<?php 
session_start();
require_once('../inc/db.php') ?>
<?php require_once('inc/top.php');
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{
?> 
<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        
        $get_teacher = "SELECT * FROM gallery WHERE gallery_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
        
        $gallery_title = $row_teacher['gallery_title'];

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
                <h1 class="text-danger">Edit Photos </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-12">
                    <label>Title Of Photo</label>
                    <input type="text" class="form-control"  name="title" value="<?php echo"$gallery_title";?>">
                  </div>
                    <div class="form-group col-md-12">
                    <label>Upload Photo</label>
                    <input type="file" class="btn btn-primary" name="u_image">
                    </div>
                <button type="submit" class="btn btn-warning col-md-offset-2" name="update">Update</button>
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
      $gallery_title = $_POST['title'];
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");

      
      

      $insert_news = "update gallery set 
      gallery_title = '$gallery_title' ,
      gallery_image = '$u_image' 

      where gallery_id = '$ida'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
	   echo"<script>window.open('view_gallery.php','_self')</script>";
        }
    }
}
?>
