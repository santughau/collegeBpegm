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
        
        $get_teacher = "SELECT * FROM scouncil WHERE s_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
        
        $s_id = $row_teacher['s_id'];
        $teacher_sr = $row_teacher['teacher_sr'];
        $s_name = $row_teacher['s_name'];
        $s_design  = $row_teacher['s_design'];
        $s_class  = $row_teacher['s_class'];
        $s_add  = $row_teacher['s_add'];
        $s_mobile  = $row_teacher['s_mobile'];
        
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
            <div class="col-md-9">
                <h1 class="text-danger">Edit Student's Council </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-8">
                    <label>Name Of Student</label>
                    <input type="text" class="form-control"   name="name" required="required" value="<?php echo"$s_name";?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Desiginationn</label>
                    <input type="text" class="form-control" name="deg" required="required" value="<?php echo"$s_design";?>">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Class</label>
                    <input type="text" class="form-control" name="class" required="required" value="<?php echo"$s_class";?>">
                  </div>
                    <div class="form-group col-md-8">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" required="required" value="<?php echo"$s_add";?>">
                  </div>
                    <div class="form-group col-md-3">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" required="required" value="<?php echo"$s_mobile";?>">
                  </div>
                    <div class="form-group col-md-2">
                    <label>Index No</label>
                    <input type="text" class="form-control" name="sr" required="required" value="<?php echo"$teacher_sr";?>" disabled="disabled">
                  </div>
                    <div class="form-group col-md-7">
                    <label>Upload Photo</label>
                    <input type="file" class="btn btn-primary" name="u_image" required="required" >
                    </div>
                  <button type="submit" class="btn btn-warning col-md-offset-5" name="update">Update</button>
                </form>
                <div class="clearfix"></div><hr>
                <table class="table table-responsive table-striped table-hover table-bordered table-condensed">
                    <thead class="text-center text-primary">
                        <tr class="info">
                            <td>Sr No</td>
                            <td>Index No</td>
                            <td>Name Of Teacher</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $member_info = "SELECT * FROM scouncil ORDER BY teacher_sr ASC ";

                                $member_run = mysqli_query($con,$member_info);
                                $i=0;
                                while($row=mysqli_fetch_array($member_run)){
                                    
                                    $teacher_sr = $row['teacher_sr'];
                                    $s_name = $row['s_name'];
                                    $i=$i+1;
                                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $teacher_sr; ?></td>
                            <td><?php echo $s_name; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
      $s_name = $_POST['name'];
      $s_design = $_POST['deg'];
      $s_class = $_POST['class'];
      $s_add = $_POST['address'];
      $s_mobile = $_POST['mobile'];
      
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");
      
       
     $insert_news = "update scouncil set 
      s_name = '$s_name',
      s_design = '$s_design',
      s_class = '$s_class',
      s_add = '$s_add',
      s_mobile = '$s_mobile',
      s_image = '$u_image'
      where s_id = '$ida'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
	   echo"<script>window.open('view_scouncil.php','_self')</script>";
       }
    }
    }
?>
