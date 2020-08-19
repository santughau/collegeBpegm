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
                <h1>Student's Council <small>Statistic Overview</small></h1><hr>
                <table class="table table-responsive table-striped table-hover table-bordered table-condensed alunmi">
                                    <thead class="text-center text-primary">
                                        <tr class="info">
                                            <td>Sr No</td>
                                            <td>Name Of Student</td>
                                            <td>Degisination</td>
                                            <td>Class </td>
                                            <td>Address  </td>
                                            <td>Mobile No   </td>
                                            <td>I No</td>
                                            <td>Photo</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $record_per_page = 20;
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

                                 $member_info = "SELECT * FROM scouncil ORDER BY teacher_sr ASC LIMIT $start_from, $record_per_page";

            $member_run = mysqli_query($con,$member_info);
            $ia=0;
            while($row=mysqli_fetch_array($member_run)){
            $s_id = $row['s_id'];
            $teacher_sr = $row['teacher_sr'];
            $s_name = ucwords($row['s_name']);
            $s_design = ucwords($row['s_design']);
            $s_class = ucwords($row['s_class']);
            $s_add = ucwords($row['s_add']);
            $s_image = $row['s_image'];
            $s_mobile = $row['s_mobile'];
                                   
                                    $ia=$ia+1;
                               
                                ?>
                                        <tr>
                                            <td><?php echo $s_id; ?></td>
                                            <td><?php echo $s_name; ?></td>
                                            <td><?php echo $s_design; ?></td>
                                            <td><?php echo $s_class; ?> </td>
                                            <td><?php echo $s_add; ?>  </td>
                                            <td><?php echo $s_mobile; ?></td>
                                            <td><?php echo $teacher_sr; ?></td>
                                            <td><img src="../images/<?php echo $s_image; ?>"></td>
                                            <td><a href="edit_scouncil.php?id=<?php echo $s_id ;?>" class="btn btn-success btn-sm a">Edit</a></td>
                                            <td><a href="del_scouncil.php?id=<?php echo $s_id ;?>" class="btn btn-danger btn-sm a">Delete</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                </table>
                
                
                <div class="mypagenation">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <?php 
                            $page_query = "select * from alumni ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='view_alumni.php?page=".$i."'>".$i."</a></li>";
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
