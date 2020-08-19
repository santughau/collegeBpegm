<?php 
$page_title = "BPEGM | Photo Gallery";
$page_key = "Dr Kalaskar Suryakant Nagnathrao, Dr Kalaskar S. N., Hanegaon Taluka Degloor Dist Nanded,Lecture in Degloor, Nanded, Top college in degloor nanded,top college in SRTUMU,BPEGM hanegaon, bpegmhanegaon.in,Late.b.p.e.g.m Hanegaon,vinay computers degloor, gaurav sontakke";
$page_desc = "";
require_once('inc/db.php') ?>
<?php require_once('inc/header.php') ?>

    <body>
        <?php include('inc/nav.php') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="teacher">
                        <div class="row">
                            <div class="col-md-12">
                               <h3 class="text-center">Photo Gallery of College</h3>
                            </div>
                        </div>
                    </div>
                        <?php
                                $record_per_page = 6;
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
                                while($row=mysqli_fetch_array($member_run)){
                                    $gallery_id = $row['gallery_id'];
                                    $gallery_title = ucwords($row['gallery_title']);
                                    $gallery_image = $row['gallery_image'];
                                    
                               
                                ?>
                <div class="col-md-4 ">
                    <div class="teacher">
                        <div class="row">
                            <div class="col-md-12 gallery">
                                <img src="images/<?php echo $gallery_image; ?>" class="img-responsive"><hr>
                                <h4 class="text-primary"><?php echo $gallery_title; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
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
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='gallery.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                          </ul>
                        </nav>
                    </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>