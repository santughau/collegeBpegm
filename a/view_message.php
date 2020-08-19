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
            <div class="col-md-9 gallery">
                <h1>Messages <small>Statistic Overview</small></h1><hr>
                <table class="table table-responsive table-striped table-hover table-bordered table-condensed text-center">
                                    <thead class=" text-primary">
                                        <tr class="info">
                                            <td>Sr No</td>
                                            <td>Date</td>
                                            <td>Contact Name</td>
                                            <td>Email</td>
                                            <td>Mobile No</td>
                                            <td>Message</td>
                                        </tr>
                                    </thead>
                                    <tbody>
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

                                 $member_info = "SELECT * FROM contact ORDER BY contact_id DESC LIMIT $start_from, $record_per_page";

            $member_run = mysqli_query($con,$member_info);
                                $ia=0;
            while($row=mysqli_fetch_array($member_run)){
                                    
            $contact_id = $row['contact_id'];
            $contact_name = ucwords($row['contact_name']);
            $contact_email = $row['contact_email'];
            $contact_mobile = $row['contact_mobile'];
            $contact_message = ucwords($row['contact_message']);
            $contact_time = $row['contact_time'];
                                    
                                    $ia=$ia+1;
                           
                                ?>
                                        <tr>
                                            <td><?php echo $ia; ?></td>
                                            <td><?php echo $contact_time; ?></td>
                                            <td><?php echo $contact_name; ?></td>
                                            <td><?php echo $contact_email; ?></td>
                                            <td><?php echo $contact_mobile; ?></td>
                                            <td><?php echo $contact_message; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                
                
                <div class="mypagenation">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <?php 
                            $page_query = "select * from contact ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='view_message.php?page=".$i."'>".$i."</a></li>";
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
