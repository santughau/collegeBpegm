<?php 
$page_title = "BPEGM | Alumni Students";
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
                               <h3 class="text-center">Alumni of College</h3>
                            </div>
                        </div>
                    </div>
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

                                 $member_info = "SELECT * FROM alumni ORDER BY alumni_id ASC LIMIT $start_from, $record_per_page";

                    $member_run = mysqli_query($con,$member_info);
                    while($row=mysqli_fetch_array($member_run)){
                    $alumni_id = $row['alumni_id'];
                    $alumni_name = ucwords($row['alumni_name']);
                    $alumni_design = ucwords($row['alumni_design']);
                    $alumni_image = $row['alumni_image'];
                               
                                ?>
                <div class="col-md-3 ">
                    <div class="teacher">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="images/<?php echo $alumni_image ?> " class="img-responsive"><hr>
                                <h4 class="text-primary text-center"><?php echo $alumni_name ?><br>
                                <small><?php echo $alumni_design ?></small></h4>
                                
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
                            $page_query = "select * from alumni ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='alumni.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                          </ul>
                        </nav>
                    </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>