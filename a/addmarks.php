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
               
                <div class="row">
                <div class="col-md-12">
                    <?php
                    if(isset($_GET['std_id']))
                    {
                      $student_id = $_GET['std_id'];
                    }
                        ?>
                </div>
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