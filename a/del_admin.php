<?php
session_start();
require_once('../inc/db.php');
if(!isset($_SESSION['user_email'])){
    header("location:../index.php");
}
else{

if (isset($_GET['id'])){
$delete_id = $_GET['id'];
$delete = "delete from adminis where teacher_id = '$delete_id'";	
$run_delete = mysqli_query ($con,$delete);
if($run_delete){
echo "<script>alert('You have been deleted successfully')</script>";
echo "<script>window.open('view_admin.php','_self')</script>";
    }

}
}
?>