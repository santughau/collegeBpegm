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
        
    $get_teacher = "SELECT * FROM alumni WHERE alumni_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
        
        $alumni_id = $row_teacher['alumni_id'];
        $alumni_name = $row_teacher['alumni_name'];
        $alumni_design = $row_teacher['alumni_design'];
        $alumni_image  = $row_teacher['alumni_image'];
        
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
            <div class="col-md-5">
                <h1 class="text-danger">Edit Alumni </h1><hr>
                <form method="post" action="" enctype="multipart/form-data" >
                  <div class="form-group col-md-12">
                    <label>Name Of Student</label>
                    <input type="text" class="form-control"   name="name" required="required" value="<?php echo"$alumni_name";?>">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Desiginationn</label>
                    <input type="text" class="form-control" name="deg" required="required" value="<?php echo"$alumni_design";?>">
                  </div>
                    <div class="form-group col-md-12">
                    <label>Upload Photo</label>
                    <input type="file" class="btn btn-primary" name="u_image" required="required" value="<?php echo"$alumni_image";?>">
                    </div>
                  
                  <button type="submit" class="btn btn-warning col-md-offset-5" name="update">Update</button>
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
      $alumni_name = $_POST['name'];
      $alumni_design = $_POST['deg'];
      
      
      

      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");
      
       
     $insert_news = "update alumni set 
      alumni_name = '$alumni_name',
      alumni_design = '$alumni_design',
      alumni_image = '$u_image'
      where alumni_id = '$ida'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
	   echo"<script>window.open('view_alumni.php','_self')</script>";
       }
    }
}
?>

