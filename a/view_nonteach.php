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
                <h1>Non Teacher's <small>Statistic Overview</small></h1><hr>
                <?php
                                $record_per_page = 4;
                                $page = '';
                                if (isset($_GET["page"]))
                                {
                                $page = $_GET["page"];
                                }
                                else 
                                {
                                $page = 1;	
                                }
                        $start_from = ($page-1)*$record_per_page;

                                 $member_info = "SELECT * FROM nonteaching ORDER BY teacher_sr ASC LIMIT $start_from, $record_per_page";

                $member_run = mysqli_query($con,$member_info);
                while($row=mysqli_fetch_array($member_run)){
                $teacher_id = $row['teacher_id'];
                $teacher_sr = $row['teacher_sr'];
                $teacher_name = ucwords($row['teacher_name']);
                $teacher_design = ucwords($row['teacher_design']);
                $teacher_dept = ucwords($row['teacher_dept']);
                $teacher_qual = ucwords($row['teacher_qual']);
                $teacher_dob = $row['teacher_dob'];
                $teacher_doj = $row['teacher_doj'];
                $teacher_add = ucwords($row['teacher_add']);
                $teacher_contact = $row['teacher_contact'];
                $teacher_email = $row['teacher_email'];
                $teacher_blood = ucwords($row['teacher_blood']);
                $teacher_image = $row['teacher_image'];
                                ?>
                <div class="teach">
                    <div class="row">
                    <div class="col-md-3">
                        <img src="../images/<?php echo $teacher_image ?>" class="img-responsive">
                        <h4 class="text-danger"><?php echo $teacher_name ?>
                        </h4>
                        <b><small><?php echo $teacher_design ?></small></b><br>
                        <small><?php echo $teacher_dept ?></small>
                    </div>
                    <div class="col-md-8 tea">
                        <div class="row tek color1">
                            <div class="col-md-4">
                                <h4>Email Address </h4>
                                <small><?php echo $teacher_email ?></small>
                            </div>
                            <div class="col-md-4">
                            <h4>Qualification </h4>
                                <small><?php echo $teacher_qual ?></small>
                            </div>
                            <div class="col-md-4">
                                <h4>Date of Birth </h4>
                                <small><?php echo $teacher_dob ?></small>
                            </div>
                        </div>
                        <div class="row tek color2">
                            <div class="col-md-4">
                                <h4>Date of Joining </h4>
                                <small><?php echo $teacher_doj ?></small>
                            </div>
                            <div class="col-md-4">
                                <h4>Blood Group </h4>
                                <small><?php echo $teacher_blood ?></small>
                            </div>
                            <div class="col-md-4">
                                <h4>Contact No </h4>
                                <small><?php echo $teacher_contact ?></small>
                            </div>
                        </div>
                        <div class="row tek color3" >
                            <div class="col-md-12">
                                <h4>Address </h4>
                                <small><?php echo $teacher_add ?></small>
                            </div>
                        </div>
                    </div>
                        <div class="clearfix"></div><br>
                        <a href="edit_nonteacher.php?id=<?php echo $teacher_id ;?>" class="btn btn-success">Edit</a>
                        <a href="del_nonteacher.php?id=<?php echo $teacher_id ;?>" class="btn btn-danger">Delete</a>
                </div>
                </div>
                <?php } ?>
                <div class="mypagenation">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        </li>
                        <?php 
                            $page_query = "select * from nonteaching ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li  class='".($page==$i ? 'active':'')."'><a href='view_nonteach.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                      </ul>
                    </nav>
                </div>
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
