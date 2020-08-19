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
        
        $get_teacher = "SELECT * FROM posts WHERE post_id = '$id'";
        $run_teacher = mysqli_query($con,$get_teacher);
	    $row_teacher = mysqli_fetch_array($run_teacher);
        
        $post_title = $row_teacher['post_title'];
        $post_date = $row_teacher['post_date'];
        $post_author = $row_teacher['post_author'];
        $post_content = $row_teacher['post_content'];

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
                <h1 class="text-danger">Edit Notice  </h1><hr>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group col-md-12">
                    <label>Add Title</label>
                    <input type="text" class="form-control"   name="title" required="required" value="<?php echo"$post_title";?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Written By</label>
                    <input type="text" class="form-control"   name="author" required="required" value="<?php echo"$post_author";?>">
                  </div>
                    
                 <div class="form-group col-md-12">
                    <textarea class="form-control" rows="3" name="content"><?php echo"$post_content";?></textarea>
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
      $post_title = $_POST['title'];
      $post_author = $_POST['author'];
      $post_content = $_POST['content'];
      

      $insert_news = "update posts set 
       	post_title = '$post_title' ,
        post_author = '$post_author', 
        post_content = '$post_content' 

      where post_id = '$ida'";
      
      $insert_pro = mysqli_query($con, $insert_news);
      
      if($insert_pro){
	   echo"<script>alert('Welcome, You have Updated Succcessfully !')</script>";
	   echo"<script>window.open('view_notice.php','_self')</script>";
        }
    }
    }
?>
