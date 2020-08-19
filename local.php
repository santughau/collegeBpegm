<?php 
$page_title = "BPEGM | Local Comittee";
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
                                <h2 class="text-center text-danger">Local Management Comittee</h2><hr>
                               <h3 class="text-center">Late. Bapusaheb Patil Ekambekar<br>Gramin College Hanegaon<br>Tq. Degloor Dist: Nanded</h3>
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

                                 $member_info = "SELECT * FROM local ORDER BY member_sr ASC LIMIT $start_from, $record_per_page";

                $member_run = mysqli_query($con,$member_info);
                while($row=mysqli_fetch_array($member_run)){
                $member_id = $row['member_id'];
                $member_sr = $row['member_sr'];
                $member_name = ucwords($row['member_name']);
                $member_desg = ucwords($row['member_desg']);
                $member_add = ucwords($row['member_add']);
                $member_contact = $row['member_contact'];
                $member_email = $row['member_email'];
                $member_image = $row['member_image'];
                                
                                ?>
                    <div class="teacher col-md-4">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <img src="images/<?php echo $member_image; ?>" class="img-responsive">
                                <table class="table table-responsive table-striped table-hover table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><span class="text-primary">Name Of Member : </span><?php echo $member_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Degisination : </span><?php echo $member_desg; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Address : </span><?php echo $member_add; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Contact No : </span><?php echo $member_contact; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Email Address : </span><?php echo $member_email; ?></td>
                                        </tr>
                                    </tbody>
                                </table><hr>
                                
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                    </div>
                    <div class="mypagenation"> 
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <?php 
                            $page_query = "select * from teacher ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='local.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                          </ul>
                        </nav>
                    </div>
                
                
            </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>