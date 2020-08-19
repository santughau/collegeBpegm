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
        
    $get_teacher = "SELECT * FROM adminis WHERE teacher_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
        
        $teacher_sr = $row_teacher['teacher_sr'];
        $teacher_name = $row_teacher['teacher_name'];
        $teacher_design = $row_teacher['teacher_design'];
        $teacher_dept 	 = $row_teacher['teacher_dept'];
        $teacher_qual 	 = $row_teacher['teacher_qual'];
        $teacher_dob 	 = $row_teacher['teacher_dob'];
        $teacher_doj 	 = $row_teacher['teacher_doj'];
        $teacher_add 	 = $row_teacher['teacher_add'];
        $teacher_contact 	 = $row_teacher['teacher_contact'];
        $teacher_email 	 = $row_teacher['teacher_email'];
        $teacher_blood 	 = $row_teacher['teacher_blood'];
        $teacher_image 	 = $row_teacher['teacher_image'];
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
                <h1 class="text-danger">Edit Administrative Staff </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-8">
                    <label>Name Of Lecture</label>
                    <input type="text" class="form-control"   name="name" required="required" value="<?php echo"$teacher_name";?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Degisination</label>
                    <input type="text" class="form-control"   name="deg" required="required" value="<?php echo"$teacher_design";?>">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Department </label>
                    <input type="text" class="form-control"   name="dept" required="required" value="<?php echo"$teacher_dept";?>">
                  </div>
                  
                    <div class="form-group col-md-4">
                    <label>Qualification </label>
                    <input type="text" class="form-control"   name="qual" required="required" value="<?php echo"$teacher_qual";?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Date of Birth</label>
                    <input type="text" class="form-control"   name="dob" required="required" value="<?php echo"$teacher_dob";?>">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Date of Joining</label>
                    <input type="text" class="form-control"   name="doj" required="required" value="<?php echo"$teacher_doj";?>">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Contact No</label>
                    <input type="text" class="form-control"   name="mobile" required="required" value="<?php echo"$teacher_contact";?>">
                  </div>
                    <div class="form-group col-md-2">
                    <label>B Gr</label>
                    <input type="text" class="form-control"   name="bloodgroup" required="required" value="<?php echo"$teacher_blood";?>">
                  </div>
                    <div class="form-group col-md-2">
                    <label>Index No</label>
                    <input type="text" class="form-control"   name="sr" required="required" value="<?php echo"$teacher_sr";?>" disabled="disabled">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Address </label>
                    <input type="text" class="form-control"   name="add" required="required" value="<?php echo"$teacher_add";?>">
                  </div>
                    
                  <div class="form-group col-md-6">
                    <label>Email Address</label>
                    <input type="text" class="form-control"   name="email" required="required" value="<?php echo"$teacher_email";?>">
                  </div>
                    <div class="form-group col-md-6">
                    <label>Upload Photo</label>
                    <input type="file" class="btn btn-primary" name="u_image" required="required">
                    </div>
                
                  
                  <button type="submit" class="btn btn-warning navbar-right" name="update">Update</button>
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
                                $member_info = "SELECT * FROM adminis ORDER BY teacher_sr ASC ";

                                $member_run = mysqli_query($con,$member_info);
                                $i=0;
                                while($row=mysqli_fetch_array($member_run)){
                                    $teacher_id = $row['teacher_id'];
                                    $teacher_sr = $row['teacher_sr'];
                                    $teacher_name = $row['teacher_name'];
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
<?php } ?>
