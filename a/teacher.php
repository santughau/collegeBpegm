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
                <h1 class="text-danger">  Add Teachers </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-8">
                    <label >Name Of Lecture</label>
                    <input type="text" class="form-control"  placeholder="Name Of Lecture" name="name" required="required">
                  </div>
                  <div class="form-group col-md-4">
                    <label >Degisination</label>
                    <input type="text" class="form-control"  placeholder="Degisination" name="deg" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label >Department </label>
                    <input type="text" class="form-control"  placeholder="Department" name="dept" required="required">
                  </div>
                  <div class="form-group col-md-4">
                    <label >Subject </label>
                    <input type="text" class="form-control"  placeholder="Subject" name="sub" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label >Qualification </label>
                    <input type="text" class="form-control"  placeholder="Qualification" name="qual" required="required">
                  </div>
                  <div class="form-group col-md-4">
                    <label >Date of Birth</label>
                    <input type="text" class="form-control"  placeholder="Date of Birth" name="dob" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label >Date of Joining</label>
                    <input type="text" class="form-control"  placeholder="Date of Joining" name="doj" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label >Contact No</label>
                    <input type="text" class="form-control"  placeholder="Contact No" name="mobile" required="required">
                  </div>
                  <div class="form-group col-md-8">
                    <label >Address </label>
                    <input type="text" class="form-control"  placeholder="Address" name="add" required="required">
                  </div>
                    <div class="form-group col-md-2">
                    <label >B Gr</label>
                    <input type="text" class="form-control"  placeholder="Blood Group" name="bloodgroup" required="required">
                  </div>
                    <div class="form-group col-md-2">
                    <label >Index No</label>
                    <input type="text" class="form-control"  placeholder="Blood Group" name="sr" required="required">
                  </div>
                    
                  <div class="form-group col-md-6">
                    <label >Email Address</label>
                    <input type="email" class="form-control"  placeholder="Email Address" name="email" required="required">
                  </div>
                    <div class="form-group col-md-6">
                    <label> Upload Photo</label>
                    <input type="file" class="btn btn-warning" name="u_image" required="required">
                    </div>
                  
                  <button type="submit" class="btn btn-warning navbar-right"  name="submit">Submit</button>
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
                                $member_info = "SELECT * FROM teacher ORDER BY teacher_sr ASC ";

                                $member_run = mysqli_query($con,$member_info);
                                $i=0;
                                while($row=mysqli_fetch_array($member_run)){
                                    $teacher_id = $row['teacher_id'];
                                    $teacher_sr = $row['teacher_sr'];
                                    $teacher_name = ucwords($row['teacher_name']);
                                    $i=$i+1;
                                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $teacher_sr; ?></td>
                            <td><?php echo $teacher_name; ?></td>
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
      $dept = $_POST['dept'];
      $sub = $_POST['sub'];
      $qual = $_POST['qual'];
      $dob = $_POST['dob'];
      $doj = $_POST['doj'];
      $mobile = $_POST['mobile'];
      $add = $_POST['add'];
      $bloodgroup = $_POST['bloodgroup'];
      $email = $_POST['email']; 
      $sr = $_POST['sr']; 
      
      $get_sr = "SELECT * FROM teacher where teacher_sr = '$sr'";
        $run_sr = mysqli_query($con,$get_sr);
        $check = mysqli_num_rows($run_sr);
        
        if($check == 1){
            echo "<script>alert('Index No is  already registered! Try another')</script>";
            exit();
        }
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");
      
      $insert_news = "INSERT INTO teacher (teacher_name,teacher_design,teacher_dept,teacher_sub,teacher_qual,teacher_dob,teacher_doj,teacher_add,teacher_contact,teacher_email,teacher_blood,teacher_image,teacher_sr) VALUES ('$name','$deg','$dept','$sub','$qual','$dob','$doj','$add','$mobile','$email','$bloodgroup','$u_image','$sr')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have added a new teacher !')</script>";
	   echo"<script>window.open('teacher.php','_self')</script>";
        }
  }  
    }
?>
