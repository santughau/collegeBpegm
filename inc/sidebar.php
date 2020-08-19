<div class="widget">
    <div class="popular">
    <h4>Principal's Desk</h4><hr>
    
        <div class="row">
            <div class="col-md-4 principal-photo">
                <img src="images/pricipal_photo.jpg">
            </div>
            <div class="col-md-8 desk-front">
                <strong> Dear Students!</strong> Welcome to Late Bapusaheb Patil...<br>
                <a href="principal.php" class="btn btn-primary navbar-right btn-sm">Read More</a>
            </div>
        </div>
                        

    </div>
</div><!----Widget Closed-->

<div class="widget sec">
    <div class="popular">
    <h4>Notice Board <span class="label label-danger">New</span></h4><hr>
    
        <div class="row">
            <div class="col-md-12 desk-front">
                <table class="table table-responsive table-striped text-center">
                    <tbody>
                        <?php 
                        $post_title = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 10 ";
                        $post_run = mysqli_query($con,$post_title);
                        if(mysqli_num_rows($post_run) > 0){
                        while($row=mysqli_fetch_array($post_run)){
                            $post_id = $row['post_id'];
                            $post_title = ucfirst($row['post_title']);
                            echo "<tr>
                            <td><a href='post.php?post_id=$post_id'>$post_title</a></td>
                        </tr>";
                        }
                        }
                        ?>
                    </tbody>
                </table>
                <a href="post.php" class="btn btn-primary">View All</a>
            </div>
        </div>
                        

    </div>
</div><!----Widget Closed-->

<div class="widget">
    <div class="popular">
    <h4>Admin Login</h4><hr>
    
        <div class="row">
            <div class="col-md-12 desk-front">
                <form method="post" action="">
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" class="form-control"  placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control"  placeholder="Password" name="pass">
                  </div>
                  <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
            </div>
        </div>
                        

    </div>
</div><!----Widget Closed-->
<?php 
//session_start();

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
