<?php 
$page_title = "BPEGM | Administrative Staff";
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
                               <h3 class="text-center">Administrative Staff</h3>
                            </div>
                        </div>
                    </div>
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

                                 $member_info = "SELECT * FROM adminis ORDER BY teacher_sr ASC LIMIT $start_from, $record_per_page";

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
                    <div class="teacher col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="images/<?php echo $teacher_image; ?>" class="img-responsive">
                                <table class="table table-responsive table-striped table-hover table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><span class="text-primary">Name Of Employee : </span><?php echo $teacher_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Degisination : </span><?php echo $teacher_design; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Department : </span><?php echo $teacher_dept; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Qualification : </span><?php echo $teacher_qual; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Date of Birth : </span><?php echo $teacher_dob; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Date of Joining : </span><?php echo $teacher_doj; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Address : </span><?php echo $teacher_add; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Contact No : </span><?php echo $teacher_contact; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Email Address : </span><?php echo $teacher_email; ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-primary">Blood Group : </span><?php echo $teacher_blood; ?></td>
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
                            $page_query = "select * from adminis ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='admin-staff.php?page=".$i."'>".$i."</a></li>";
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