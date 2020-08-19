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
        
    $get_teacher = "SELECT * FROM society WHERE member_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
        
        $member_id = $row_teacher['member_id'];
        $member_sr = $row_teacher['member_sr'];
        $member_name = $row_teacher['member_name'];
        $member_desg 	 = $row_teacher['member_desg'];
        $member_add 	 = $row_teacher['member_add'];
        $member_contacta 	 = $row_teacher['member_contact'];
        $member_email 	 = $row_teacher['member_email'];
        $member_image 	 = $row_teacher['member_image'];
        
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
                <h1 class="text-danger">Edit Society  </h1><hr>
                <form method="post" action="" enctype="multipart/form-data" >
                  <div class="form-group col-md-8">
                    <label>Name Of the Member</label>
                    <input type="text" class="form-control"   name="name" required="required" value="<?php echo"$member_name";?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Degisination</label>
                    <input type="text" class="form-control"   name="deg" required="required" value="<?php echo"$member_desg";?>">
                  </div>
                    <div class="form-group col-md-8">
                    <label>Address </label>
                    <input type="text" class="form-control"   name="add" required="required" value="<?php echo"$member_add";?>">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Contact No</label>
                    <input type="text" class="form-control"  name="mobile" required="required" value="<?php echo"$member_contacta";?>">
                  </div>
                 <div class="form-group col-md-4">
                    <label>Email Address</label>
                    <input type="email" class="form-control"   name="email" required="required" value="<?php echo"$member_email";?>">
                  </div>
                    <div class="form-group col-md-2">
                    <label>Index No</label>
                    <input type="text" class="form-control"  placeholder="I. No" name="sr" required="required" disabled="disabled" value="<?php echo"$member_sr";?>">
                  </div>
                    
                    <div class="form-group col-md-6">
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
                            <td>Name Of Member</td>
                            <td>Design. Of Member</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $member_info = "SELECT * FROM society ORDER BY member_sr ASC ";

                                $member_run = mysqli_query($con,$member_info);
                                $i=0;
                                while($row=mysqli_fetch_array($member_run)){
                                    $member_sr = $row['member_sr'];
                                    $member_name = $row['member_name'];
                                    $member_desg = $row['member_desg'];
                                    $i=$i+1;
                                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $member_sr; ?></td>
                            <td><?php echo $member_name; ?></td>
                            <td><?php echo $member_desg; ?></td>
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
      $member_name = $_POST['name'];
      $member_desg = $_POST['deg'];
      $member_contact = $_POST['mobile'];
      $member_add = $_POST['add'];
      $member_email = $_POST['email']; 

      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");

       $insert_news = "update society set 
      member_name = '$member_name' ,
      member_desg = '$member_desg' ,
      member_add = '$member_add' ,
      member_contact = '$member_contact' ,
      member_email = '$member_email' ,
      member_image = '$u_image' 
      
      
      where member_id = '$ida'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
	   echo"<script>window.open('view_wcom.php','_self')</script>";
        }
    }
    }
?>


