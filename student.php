<?php 
$page_title = "BPEGM | Student's Council";
$page_key = "Dr Kalaskar Suryakant Nagnathrao, Dr Kalaskar S. N., Hanegaon Taluka Degloor Dist Nanded,Lecture in Degloor, Nanded, Top college in degloor nanded,top college in SRTUMU,BPEGM hanegaon, bpegmhanegaon.in,Late.b.p.e.g.m Hanegaon,vinay computers degloor, gaurav sontakke";
$page_desc = "";
require_once('inc/db.php') ?>
<?php require_once('inc/header.php') ?>

    <body>
        <?php include('inc/nav.php') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="teacher">
                        <div class="row">
                            <div class="col-md-12">
                               <h3 class="text-center">Student Council Year 2017-2018</h3>
                            </div>
                        </div>
                    </div>
                    <?php
                                $record_per_page = 9;
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

                                 $member_info = "SELECT * FROM scouncil ORDER BY s_id ASC LIMIT $start_from, $record_per_page";

                                $member_run = mysqli_query($con,$member_info);
                                while($row=mysqli_fetch_array($member_run)){
                                    $s_id = $row['s_id'];
                                    $s_name = ucwords($row['s_name']);
                                    $s_design = ucwords($row['s_design']);
                                    $s_class = ucwords($row['s_class']);
                                    $s_add = ucwords($row['s_add']);
                                    $s_mobile = $row['s_mobile'];
                                    $s_image = $row['s_image'];
                                    
                                ?>
                    <div class="teacher col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="images/<?php echo $s_image ?>" class="img-responsive">
                                <table class="table table-responsive table-striped table-hover table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><span class="text-primary">Name Of Student : </span><?php echo $s_name ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Degisination : </span><?php echo $s_design ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Class : </span><?php echo $s_class ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Address : </span><?php echo $s_add ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Mobile No : </span><?php echo $s_mobile ?></td>
                                        </tr>
                                    </tbody>
                                </table><hr>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>