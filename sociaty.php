<?php 
$page_title = "BPEGM | Working Comittee";
$page_key = "Dr Kalaskar Suryakant Nagnathrao, Dr Kalaskar S. N., Hanegaon Taluka Degloor Dist Nanded,Lecture in Degloor, Nanded, Top college in degloor nanded,top college in SRTUMU,BPEGM hanegaon, bpegmhanegaon.in,Late.b.p.e.g.m Hanegaon,vinay computers degloor, gaurav sontakke";
$page_desc = "";
require_once('inc/db.php') ?>
<?php require_once('inc/header.php') ?>

    <body>
        <?php include('inc/nav.php') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="teacher">
                        <div class="row">
                            <div class="col-md-12">
                                <small class="navbar-right">Reg No.205 Nanded</small>
                                <h2 class="text-center text-danger">Working Comittee</h2><hr>
                               <h3 class="text-center">Banjara Shikshan Prasarak Mandal<br>Shilvani(Border) Tanda<br>Tq. Degloor Dist: Nanded</h3>
                            </div>
                        </div>
                    </div>
                     <?php
                                $record_per_page = 7;
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

                                 $member_info = "SELECT * FROM society ORDER BY member_sr ASC LIMIT $start_from, $record_per_page";

             $member_run = mysqli_query($con,$member_info);
             while($row=mysqli_fetch_array($member_run)){
                    $member_id = $row['member_id'];
                    $member_sr = $row['member_sr'];
                    $member_name = ucwords($row['member_name']);
                    $member_desg = ucwords($row['member_desg']);
                    $member_add = ucwords($row['member_add']);
                    $member_contact = ucwords($row['member_contact']);
                    $member_email = ucwords($row['member_email']);
                    $member_image = $row['member_image'];
            ?>
                    <div class="teacher">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="images/<?php echo $member_image; ?>" class="img-responsive">
                            </div>
                            <div class="col-md-9">
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
                                </table>
                                <hr>
                                
                            </div> 
                        </div>
                    </div>
                    <?php } ?>
                    
                    <div class="mypagenation"> 
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <?php 
                            $page_query = "select * from society ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='sociaty.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                          </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="widget">
                        <div class="popular">
                        <h4 class="text-center">About Scociety</h4><hr>

                            <div class="row">
                                <div class="col-md-12 desk-front">
                                    <h4 class="text-center">Banjara Shikshan Prasarak Mandal<br>Shilvani(Border) Tanda<br>Tq. Degloor Dist: Nanded</h4><hr>
                                   A modest effort in this direction was inittiated by some eminent personalities of this area. In 1952 Founder PresidentHon'ble Dr. Shankarraoji Chavan ( Formar Union Home Minister) established first school in 1956 and then onwards there was no looking back for the society. Higer education facility was introduced in 1963 in the areas of Arts, Commerce and basic science followed by legal, technical and teachers education. Society has kept his educational graph rising for the decades. It expnaded into many schools and colleges. The society always looked forwards for upgrading the educational facilities so as to keep itself prompt with the changes in the rural and urban areas. This contribution was recognized as awards ' Dalit Mitra Puraskar' and ' Rajya Puraskar' to the society from the State Govt. of Maharastra. Society has given the significunt contributin in research and educational development of Nanded district. 
                                </div>
                            </div>


                        </div>
                    </div><!----Widget Closed-->
                    <div class="widget">
                        <div class="popular">
                        <h4 class="text-center">Scociety Address</h4><hr>

                            <div class="row">
                                <div class="col-md-12 desk-front">
                                   <address>
                                       <h4>Secretory</h4>
                                        Banjara Shikshan Prasarak Mandal<br>
                                        Shilvani(Border) Tanda<br>
                                        Tq. Degloor Dist: Nanded 431717<br>
                                        Tel. 02463-<br>
                                        Fax : 02463-<br>
                                        e-mail:- Secretory@bpegmhanegaon.in<br>
                                        Website:- www.bpegmhanegaon.in<br>
                                    </address> 
                                </div>
                            </div>
                        </div>
                    </div><!----Widget Closed-->
                </div>
            </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>