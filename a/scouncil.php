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
            <div class="col-md-9">
                <h1 class="text-danger">  Add Student's Council </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-8">
                    <label>Name Of Student</label>
                    <input type="text" class="form-control"  placeholder="Name Of Student" name="name" required="required">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Desiginationn</label>
                    <input type="text" class="form-control" name="deg" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Class</label>
                    <input type="text" class="form-control" name="class" required="required">
                  </div>
                    <div class="form-group col-md-8">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" required="required">
                  </div>
                    <div class="form-group col-md-3">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" required="required">
                  </div>
                    <div class="form-group col-md-2">
                    <label>Index No</label>
                    <input type="text" class="form-control" name="sr" required="required">
                  </div>
                    <div class="form-group col-md-7">
                    <label>Upload Photo</label>
                    <input type="file" class="btn btn-primary" name="u_image" required="required">
                    </div>
                  <button type="submit" class="btn btn-warning col-md-offset-5" name="submit">Submit</button>
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
                                    $s_name = ucwords($row['s_name']);
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
  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $deg = $_POST['deg'];
      $class = $_POST['class'];
      $mobile = $_POST['mobile'];
      $add = $_POST['address'];
      $email = $_POST['email']; 
      $sr = $_POST['sr']; 
      
      $get_sr = "SELECT * FROM scouncil where teacher_sr = '$sr'";
        $run_sr = mysqli_query($con,$get_sr);
        $check = mysqli_num_rows($run_sr);
        
        if($check == 1){
            echo "<script>alert('Index No is  already registered! Try another')</script>";
            exit();
        }
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");
      
      $insert_news = "INSERT INTO scouncil (s_name,s_design,s_class,s_add,s_mobile,s_image,teacher_sr) VALUES ('$name','$deg','$class','$add','$mobile','$u_image','$sr')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have added a new teacher !')</script>";
	   echo"<script>window.open('scouncil.php','_self')</script>";
        }
  }  
    }
?>
