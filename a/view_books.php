<?php 
session_start();
require_once('../inc/db.php');

if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{
?>
<?php require_once('inc/top.php')?> 
</head>
<body>
<div id="wrapper">
    <?php require_once('inc/header.php')?> 

    <div class="container-fluid body-section">
        <div class="row">
            <div class="col-md-3">
                <?php require_once('inc/sidebar.php')?> 
            </div>
            <div class="col-md-9">
                <h1>Books in Library <small>Statistic Overview</small></h1><hr>
                <table class="table table-responsive table-striped table-hover table-bordered table-condensed text-center">
                                    <thead class=" text-primary">
                                        <tr class="info">
                                            <td>Sr No</td>
                                            <td>Book No</td>
                                            <td>Name Of Book</td>
                                            <td>Writer</td>
                                            <td>Publisher</td>
                                            <td>Price</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
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
                                $ia=0;
                                while($row=mysqli_fetch_array($member_run)){
                                    
                                    $book_id = $row['book_id'];
                                    $book_no = $row['book_no'];
                                    $book_name = ucwords($row['book_name']);
                                    $book_write = ucwords($row['book_write']);
                                    $book_pub = ucwords($row['book_pub']);
                                    $book_price = $row['book_price'];
                                    $ia=$ia+1;
                           
                                ?>
                                        <tr>
                                            <td><?php echo $ia; ?></td>
                                            <td><?php echo $book_no; ?></td>
                                            <td><?php echo $book_name; ?></td>
                                            <td><?php echo $book_write; ?></td>
                                            <td><?php echo $book_pub; ?></td>
                                            <td>Rs.<?php echo $book_price; ?>
                                            <td><a href="edit_book.php?id=<?php echo $book_id ;?>" class="btn btn-success btn-sm a">Edit</a></td>
                                            <td><a href="del_book.php?id=<?php echo $book_id ;?>" class="btn btn-danger btn-sm a">Delete</a></td></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                
                
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
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='view_books.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                        
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('inc/footer.php')?> 
</div>  
</body>
    <script>
            CKEDITOR.replace( 'content' );
    </script>
 </html>
<?php } ?>
