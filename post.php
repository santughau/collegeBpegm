<?php 
$page_title = "BPEGM | Notice For Students";
$page_key = "Dr Kalaskar Suryakant Nagnathrao, Dr Kalaskar S. N., Hanegaon Taluka Degloor Dist Nanded,Lecture in Degloor, Nanded, Top college in degloor nanded,top college in SRTUMU,BPEGM hanegaon, bpegmhanegaon.in,Late.b.p.e.g.m Hanegaon,vinay computers degloor, gaurav sontakke";
$page_desc = "";
require_once('inc/db.php') ?>
<?php require_once('inc/header.php') ?>

    <body>
        <?php include('inc/nav.php') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
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
                        
                            if(isset($_GET['post_id'])){
                                $post_id = $_GET['post_id'];
                                $post_title = "SELECT * FROM posts";
                            $post_title .= " WHERE post_id = '$post_id'";
                                $post_run = mysqli_query($con,$post_title);
                                while($row=mysqli_fetch_array($post_run)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_date = $row['post_date'];
                                $post_author = $row['post_author'];
                                $post_content = $row['post_content'];
                               ?>
                    <div class="teacher">
                        <div class="row line">
                            <div class="col-md-12">
                                <h3><?php echo $post_title; ?></h3>
                                <small class="text-center">Date : <?php echo $post_date; ?></small><small class="navbar-right">Written By : <?php echo $post_author; ?></small><hr>
                                
                                <p><?php echo $post_content; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                         <?php   }
                            
                            else{
                           
                        $post_title = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $start_from, $record_per_page";

                        $post_run = mysqli_query($con,$post_title);
                        while($row=mysqli_fetch_array($post_run)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_date = $row['post_date'];
                            $post_author = $row['post_author'];
                            $post_content = $row['post_content'];
                        ?>
                    <div class="teacher">
                        <div class="row line">
                            <div class="col-md-12">
                                <h3><?php echo $post_title; ?></h3>
                                <small class="text-center">Date : <?php echo $post_date; ?></small><small class="navbar-right">Written By : <?php echo $post_author; ?></small><hr>
                                
                                <p><?php echo $post_content; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                    <div class="mypagenation"> 
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <?php 
                            $page_query = "select * from posts ORDER BY post_id DESC ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='post.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                          </ul>
                        </nav>
                    </div> <?php  } ?>
                </div>
                <div class="col-md-4">
                    <?php include('inc/sidebar.php') ?>
                </div>
            </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>