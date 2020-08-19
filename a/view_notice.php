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
                <h1>Notice <small>Statistic Overview</small></h1><hr>
                <div class="row">
                <div class="col-md-11 text-justify">
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
                        
                           
                           
                        $post_title = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $start_from, $record_per_page";

                        $post_run = mysqli_query($con,$post_title);
                        while($row=mysqli_fetch_array($post_run)){
                            $post_id = $row['post_id'];
                            $post_title = ucfirst($row['post_title']);
                            $post_date = $row['post_date'];
                            $post_author = ucfirst($row['post_author']);
                            $post_content = ucfirst($row['post_content']);
                        ?>
                    <div class="teacher">
                        <div class="row line">
                            <div class="col-md-12">
                                <h3><?php echo $post_title; ?></h3>
                                <small class="text-center">Date : <?php echo $post_date; ?></small><small class="navbar-right">Written By : <?php echo $post_author; ?></small><hr>
                                
                                <p><?php echo $post_content; ?></p>
                            </div>
                        </div>
                    </div>
                    <a href="edit_notice.php?id=<?php echo $post_id; ?>" class="btn btn-warning">Edit</a>
                    <a href="del_notice.php?id=<?php echo $post_id; ?>" class="btn btn-danger navbar-right">Delete</a>
                    <br><br><hr>
                    <?php  } ?>
                    <div class="mypagenation"> 
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <?php 
                            $page_query = "select * from posts ORDER BY post_id DESC ";
                            $page_result = mysqli_query($con,$page_query);
                            $total_records = mysqli_num_rows($page_result);
                            $total_pages = ceil($total_records/$record_per_page);
                            for ($i=1;$i<=$total_pages; $i++)
                            {
                                echo "<li class='".($page==$i ? 'active':'')."'><a href='view_notice.php?page=".$i."'>".$i."</a></li>";
                            }
                            ?>
                          </ul>
                        </nav>
                    </div> 
                </div>
                
            </div>
                <div class="mypagenation">
                    <nav aria-label="Page navigation">
                      <ul class="pagination">
                        
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
