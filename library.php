<?php 
$page_title = "BPEGM | College Library";
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
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                               <h3>List of Books in Library</h3>
                            </div>
                            <div class="col-md-4 top-padd">
                               <form action="" method="post">
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Search book" name="search-title">
                                      <span class="input-group-btn">
                                        <input type="submit" name="search" class="btn btn-default" value="Go!">
                                      </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="col-md-12 ">
                    <div class="teacher">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-striped table-hover table-bordered table-condensed">
                                    <thead class="text-center text-primary">
                                        <tr class="info">
                                            <td>Sr No</td>
                                            <td>Book No</td>
                                            <td>Name Of Book</td>
                                            <td>Writer</td>
                                            <td>Publisher</td>
                                            <td>Price</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $record_per_page = 100;
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

                                 $member_info = "SELECT * FROM liberary ORDER BY book_no ASC LIMIT $start_from, $record_per_page";

                                $member_run = mysqli_query($con,$member_info);
                                while($row=mysqli_fetch_array($member_run)){
                                    $i=0;
                                    $book_id = $row['book_id'];
                                    $book_no = $row['book_no'];
                                    $book_name = $row['book_name'];
                                    $book_write = $row['book_write'];
                                    $book_pub = $row['book_pub'];
                                    $book_price = $row['book_price'];
                                    $i=$i+1;
                           
                                ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $book_no; ?></td>
                                            <td><?php echo $book_name; ?></td>
                                            <td><?php echo $book_write; ?></td>
                                            <td><?php echo $book_pub; ?></td>
                                            <td>Rs.<?php echo $book_price; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
            <div class="mypagenation"> 
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <?php 
                            $page_query = "select * from liberary ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='library.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                          </ul>
                        </nav>
                    </div>
        </div>
        
        <?php include('inc/footer.php') ?>
    </body>
</html>