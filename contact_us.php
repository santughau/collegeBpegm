<?php 
$page_title = "BPEGM | COntact Us";
$page_key = "Dr Kalaskar Suryakant Nagnathrao, Dr Kalaskar S. N., Hanegaon Taluka Degloor Dist Nanded,Lecture in Degloor, Nanded, Top college in degloor nanded,top college in SRTUMU,BPEGM hanegaon, bpegmhanegaon.in,Late.b.p.e.g.m Hanegaon,vinay computers degloor, gaurav sontakke";
$page_desc = "";
require_once('inc/db.php') ?>
<?php require_once('inc/header.php') ?>

    <body>
        <?php include('inc/nav.php') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <?php include('inc/slider.php') ?>
                    <div class="welcome">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                    <div class="col-md-12 contact-form">
                        <h2>Contact Us</h2><br>
                        For any questions / additional information about S. P. College, please fill out and submit the form below: 
                        <hr>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Full Name:*</label>
                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Email:*</label>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Mobile:*</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile No" name="mobile">
                            </div>
                            <div class="form-group">
                                <label>Message:*</label>
                                <textarea placeholder="Enter Message here" class="form-control" rows="10" name="message"></textarea>
                            </div>
                            <button class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div><br><br><br><hr>
                        <div class="col-md-12"><hr>
                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyASSRYOZpuH65YKf2Kyu3ZQV9n2rzOlzn8'></script><div style='overflow:hidden;height:400px;width:100%;'><div id='gmap_canvas' style='height:400px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://indiatvnow.com/'>TV Soap from India</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=771adbb8393dc2f28fd01595020073d70b7c595e'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(18.540363,77.57486700000004),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(18.540363,77.57486700000004)});infowindow = new google.maps.InfoWindow({content:'<strong>Degloor</strong><br>vinay computers<br>431717 degloor<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="widget">
                        <div class="popular">
                        <h3>College Address</h3><hr>

                            <div class="row">
                                <div class="col-md-12 desk-front">
                                    <address>
                                       <h4 class="text-primary">Principal</h4>
                                        Late. Bapusaheb Patil Ekambekar<br>
                                        Gramin College Hanegaon<br>
                                        Tq. Degloor Dist: Nanded 431717<br>
                                        Tel. 02462-269600, 254487<br>
                                        Fax : 02462-253726<br>
                                        e-mail:- principal@bpegmhanegaon.in<br>
                                        Website:- www.bpegmhanegaon.in<br>
                                    </address>
                            </div>
                            </div>


                        </div>
</div><!----Widget Closed-->
                   <div class="widget sec">
    <div class="popular">
    <h4>Important Links</h4><hr>
    
        <div class="row">
            <div class="col-md-12 desk-front">
                <table class="table table-responsive table-striped text-center">
                    <tbody>
                        <tr>
                            <td><a href="http://www.srtmun.ac.in">SRTMU Home Page</a></td>
                        </tr>
                         <tr>
                            <td><a href="http://www.srtmun.ac.in/en/bcud/academic-section/syllabi.html">University Syllabus</a></td>
                        </tr>
                         <tr>
                            <td><a href="http://www.srtmun.ac.in/en/examination/results.html">SRTMU Result</a></td>
                        </tr>
                         <tr>
                            <td><a href="http://www.srtmun.ac.in/en/examination/examination-time-table.html">SRTMU Time Table</a></td>
                        </tr>
                         <tr>
                            <td><a href="http://jdhenanded.in/home/">Joint Director of Higher Education , Nanded</a></td>
                        </tr>
                        <tr>
                            <td><a href="http://zpnanded.in/cms/">ZP Nanded</a></td>
                        </tr>
                         <tr>
                            <td><a href="http://nanded.nic.in/">Nanded District Collector</a></td>
                        </tr>
                         <tr>
                            <td><a href="https://www.maharashtra.gov.in/1125/Home">Goverment of Maharashtra</a></td>
                        </tr>
                         <tr>
                            <td><a href="">Result Of BA Student 2017</a></td>
                        </tr>
                         <tr>
                            <td><a href="">Result Of BA Student 2017</a></td>
                        </tr>
                    </tbody>
                    
                </table>
                
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
<?php
    if(isset($_POST['submit'])){
        $contact_name = $_POST['name'];   
        $contact_email = $_POST['email'];    
        $contact_mobile = $_POST['mobile'];    
        $contact_message = $_POST['message']; 
        
        $insert_info = "INSERT INTO contact (contact_name, contact_email, contact_mobile, contact_message, contact_time) VALUES ('$contact_name', '$contact_email', '$contact_mobile', '$contact_message', NOW())";
        
        $insert_data = mysqli_query($con,$insert_info);
        echo "<script>alert('Message sent Successfully to college Administrator ')</script>";
    }
?>