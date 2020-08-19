<?php session_start();
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{
    require_once('inc/top.php');
require_once('../inc/db.php');
?>
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
                <h1><i class="fa fa-tachometer"></i>  Dashboard <small>Statistic Overview</small></h1><hr>
                <ol class="breadcrumb">
                  <li class="active"><i class="fa fa-tachometer"></i>  Dashboard</li>
                </ol>
            <div class="row tag-boxes">
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col=xs-9">
                                    <div class="text-right huge"><?php echo $row_contact; ?></div>
                                    <div class="text-right">Messages</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">View All Messages</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-camera fa-5x" aria-hidden="true"></i>
                                    
                                </div>
                                <div class="col=xs-9">
                                    <div class="text-right huge"><?php echo $row_gallery; ?></div>
                                    <div class="text-right">Gallery</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">View All Photos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col=xs-9">
                                    <div class="text-right huge"><?php echo $row_liberary; ?></div>
                                    <div class="text-right">Books</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">View All Books</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-circle-o fa-5x"></i>
                                </div>
                                <div class="col=xs-9">
                                    <div class="text-right huge"><?php echo $row_alumni; ?></div>
                                    <div class="text-right">Alumni</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">View All Alumni</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div><hr>
                <h3>Recent Notices</h3>
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Date</th>
                            <th>Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $post_title = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 5";

                        $post_run = mysqli_query($con,$post_title);
                        $i=0;
                        while($row=mysqli_fetch_array($post_run)){
                            $post_id = $row['post_id'];
                            $post_title = ucfirst($row['post_title']);
                            $post_date = $row['post_date'];
                            $post_author = ucfirst($row['post_author']);
                            $post_content = ucfirst($row['post_content']);
                            $i=$i+1;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td><?php echo $post_title; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="view_notice.php" class="btn btn-primary">View All Notice</a><hr>
                <h3>New Messages</h3>
                <table class="table table-striped table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Date</th>
                            <th>Email</th>
                            <th>Mobile NO</th>
                            <th>Messages</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
         $member_info = "SELECT * FROM contact ORDER BY contact_id DESC LIMIT 5";
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
                            <td><?php echo $contact_email; ?></td>
                            <td><?php echo $contact_mobile; ?></td>
                            <td><?php echo $contact_message; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="view_notice.php" class="btn btn-primary">View All Posts</a><hr>
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