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
                <h1>Alumni <small>Statistic Overview</small></h1><hr>
                <table class="table table-responsive table-striped table-hover table-bordered table-condensed alunmi">
                                    <thead class="text-center text-primary">
                                        <tr class="info">
                                            <td>Sr No</td>
                                            <td>Name of Alumni</td>
                                            <td>Desgination</td>
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

                                 $member_info = "SELECT * FROM alumni ORDER BY alumni_id ASC LIMIT $start_from, $record_per_page";

            $member_run = mysqli_query($con,$member_info);
            $ia=0;
            while($row=mysqli_fetch_array($member_run)){
            $alumni_id = $row['alumni_id'];
            $alumni_name = ucwords($row['alumni_name']);
            $alumni_design = ucwords($row['alumni_design']);
            $alumni_image = $row['alumni_image'];
                                    $ia=$ia+1;
                               
                                ?>
                                        <tr>
                                            <td><?php echo $ia; ?></td>
                                            <td><?php echo $alumni_name; ?></td>
                                            <td><?php echo $alumni_design; ?></td>
                                            <td><img src="../images/<?php echo $alumni_image; ?>"></td>
                                            <td><a href="edit_alumni.php?id=<?php echo $alumni_id ;?>" class="btn btn-success btn-sm a">Edit</a></td>
                                            <td><a href="del_alumni.php?id=<?php echo $alumni_id ;?>" class="btn btn-danger btn-sm a">Delete</a></td>
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
