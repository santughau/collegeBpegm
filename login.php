<?php require_once('inc/db.php'); ?>
<?php 
session_start();

       if (isset($_POST['login'])){
        
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $pass = mysqli_real_escape_string($con,$_POST['pass']);
        
        $get_user = "SELECT * FROM login where login_name = '$email' AND login_pass = '$pass'";
        $run_user = mysqli_query($con,$get_user);
        $check = mysqli_num_rows($run_user);
        
        if($check == 1){
             $_SESSION['user_email'] = $email;
            echo "<script>window.open('a/index.php','_self')</script>";
            
        }
        
                
        else {
            
            echo "<script>alert('Email Or Password is not correct !')</script>";
            
        }
        
        
        }
    
        
    
?>