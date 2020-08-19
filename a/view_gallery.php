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
            <div class="col-md-9 gallery">
                <h1>Gallery <small>Statistic Overview</small></h1><hr>
                <table class="table table-responsive table-striped table-hover table-bordered table-condensed text-center">
                                    <thead class=" text-primary">
                                        <tr class="info">
                                            <td>Sr No</td>
                                            <td>Title</td>
                                            <td>Image</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $record_per_page = 3;
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

                                 $member_info = "SELECT * FROM gallery ORDER BY gallery_id DESC LIMIT $start_from, $record_per_page";

            $member_run = mysqli_query($con,$member_info);
                                $ia=0;
            while($row=mysqli_fetch_array($member_run)){
                                    
            $gallery_id = $row['gallery_id'];
            $gallery_title = ucwords($row['gallery_title']);
            $gallery_image = $row['gallery_image'];
                                    
                                    $ia=$ia+1;
                           
                                ?>
                                        <tr>
                                            <td><?php echo $ia; ?></td>
                                            <td><?php echo $gallery_title; ?></td>
                                            <td><img src="../images/<?php echo $gallery_image; ?>"></td>
                                            <td><a href="edit_gallery.php?id=<?php echo $gallery_id ;?>" class="btn btn-success btn-sm a">Edit</a></td>
                                            <td><a href="del_gallery.php?id=<?php echo $gallery_id ;?>" class="btn btn-danger btn-sm a">Delete</a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                
                
                <div class="mypagenation">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <?php 
                            $page_query = "select * from gallery ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='view_gallery.php?page=".$i."'>".$i."</a></li>";
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
