<?php session_start();
$page_title = "BPEGM | Home Page";
$page_key = "Dr Kalaskar Suryakant Nagnathrao, Dr Kalaskar S. N., Hanegaon Taluka Degloor Dist Nanded,Lecture in Degloor, Nanded, Top college in degloor nanded,top college in SRTUMU,BPEGM hanegaon, bpegmhanegaon.in,Late.b.p.e.g.m Hanegaon,vinay computers degloor, gaurav sontakke";
$page_desc = "Dr Kalaskar Suryakant Nagnathrao, Dr Kalaskar S. N., Hanegaon Taluka Degloor Dist Nanded,Lecture in Degloor, Nanded, Top college in degloor nanded,top college in SRTUMU,BPEGM hanegaon, bpegmhanegaon.in,Late.b.p.e.g.m Hanegaon,vinay computers degloor, gaurav sontakke";
require_once('inc/db.php') ?>
<?php require_once('inc/header.php') 
?>

    <body>
        <?php include('inc/nav.php') ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <?php include('inc/slider.php') ?>
                    <div class="welcome">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 >Welcome</h2><hr>
                                <p>Welcome to Late. Bapusaheb Patil Ekambekar
Gramin College Hanegaon, Tq Degloor Dist Nanded.<br><br>
                                Since the foundation of the college in 1997, it has aspired to provide an all round education to students. The college offers a wide range of courses across a range of disciplines encompassing Arts<br><br>
                                    If you decide to choose to study at this College, you will be joining an academic institution where the needs of students are understood and their aspirations in academic, cultural, sports will be fulfilled. The training at this College would imbibe the progressive and scientific attitude in the minds of the students. This would help them in meeting the challenges of life. We are dedicated to ensure that your college life would be an enjoyable and memorable experience of your life.</p><br><br>
                                <h2>OUR VISION</h2><hr>
                                <p>To evolve as a dynamic centre of higher education disseminating knowledge rigorously at affordable cost and to emerge as a premier centre that promotes technological competence and democratic values.
                                </p><br><br>
                                <h2>OUR MISSION</h2><hr>
                                <p>To achieve a high order of excellence and a scientific outlook in diverse realms such as academics, culture and sports with a view to develop a sensitive, vibrant and globally competent human resource pool.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php include('inc/sidebar.php') ?>
                </div>
            </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>

