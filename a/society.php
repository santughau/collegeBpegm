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
                <h1 class="text-danger">  Add Society  </h1><hr>
                <form method="post" action="" enctype="multipart/form-data" >
                  <div class="form-group col-md-8">
                    <label>Name Of the Member</label>
                    <input type="text" class="form-control"  placeholder="Name Of Member" name="name" required="required">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Degisination</label>
                    <input type="text" class="form-control"  placeholder="Degisination" name="deg" required="required">
                  </div>
                    <div class="form-group col-md-8">
                    <label>Address </label>
                    <input type="text" class="form-control"  placeholder="Address" name="add" required="required">
                  </div>
                    <div class="form-group col-md-4">
                    <label>Contact No</label>
                    <input type="text" class="form-control"  placeholder="Contact No" name="mobile" required="required">
                  </div>
                 <div class="form-group col-md-4">
                    <label>Email Address</label>
                    <input type="email" class="form-control"  placeholder="Email Address" name="email" required="required">
                  </div>
                    <div class="form-group col-md-2">
                    <label>Index No</label>
                    <input type="text" class="form-control"  placeholder="I. No" name="sr" required="required">
                  </div>
                    
                    <div class="form-group col-md-6">
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
                                    $member_name = ucwords($row['member_name']);
                                    $member_desg = ucwords($row['member_desg']);
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
  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $deg = $_POST['deg'];
      $mobile = $_POST['mobile'];
      $add = $_POST['add'];
      $email = $_POST['email']; 
      $sr = $_POST['sr']; 
      
      $get_sr = "SELECT * FROM society where member_sr = '$sr'";
        $run_sr = mysqli_query($con,$get_sr);
        $check = mysqli_num_rows($run_sr);
        
        if($check == 1){
            echo "<script>alert('Index No is  already registered! Try another')</script>";
            exit();
        }
      
      $u_image = $_FILES['u_image']['name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
            
      move_uploaded_file($image_tmp,"../images/$u_image");
      
      $insert_news = "INSERT INTO society (member_name,member_desg,member_add,member_contact,member_email,member_image,member_sr) VALUES ('$name','$deg','$add','$mobile','$email','$u_image','$sr')";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have added a new teacher !')</script>";
	   echo"<script>window.open('society.php','_self')</script>";
        }
  }  
    }
?>

