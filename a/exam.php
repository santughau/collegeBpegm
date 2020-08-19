<?php session_start();
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{
    require_once('inc/top.php');
require_once('../inc/db.php');
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
                <div class="row">
                <div class="form-group col-md-3">
                    <form action="" enctype="multipart/form-data" method="post">
                    <label>PLease Select Class :</label>
                    <select class="form-control" name="class">
                       <?php 
                        $get_option = "SELECT * FROM class ORDER BY class_name ASC";
                            $run_option = mysqli_query($con,$get_option);
                             while ($row_option = mysqli_fetch_array($run_option)){
                                $class_id = $row_option['class_id'];
                                $class_name = $row_option['class_name'];
                                echo "<option value='$class_id'>$class_name</option>";
                                }
                        ?>
                    </select><br>
                    <button class="btn btn-primary" name="submit">Submit</button> 
                        </form>
                </div>
                </div><hr>
                <div class="row">
                <div class="col-md-12">
                    <table class="table table-responsive table-striped table-hover table-bordered table-condensed">
                                    <thead class="text-center text-primary">
                                        <tr class="info">
                                            <td>Sr No</td>
                                            <td>Name Of Student</td>
                                            <td>Add Mark</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php 
                    if(isset($_POST['submit']))
                    {
                      $class = $_POST['class'];
                    
                        $get_student = "SELECT * FROM student WHERE student_class = $class ORDER BY student_name ASC";
                            $run_student = mysqli_query($con,$get_student);
                             while ($row_student = mysqli_fetch_array($run_student)){
                                $student_id = $row_student['student_id'];
                                $student_name = $row_student['student_name'];
                        
                        ?>
                                        <tr >
                                            <td>1</td>
                                            <td><?php echo $student_name;?></td>
                                            <td><button   class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal">Add Marks</button></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
   <?php require_once('inc/footer.php')?>  
</div>  
<!-------------------------------------------------------->
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <select class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <select class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

M
    
<!-------------------------------------------------------->
</body>
    <script>
            CKEDITOR.replace( 'content' );
    </script>
 </html>


<?php } ?>