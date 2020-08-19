<?php

$post_title = "SELECT * FROM posts";
$post_run = mysqli_query($con,$post_title);
$row_posts = mysqli_num_rows($post_run);

$member_info = "SELECT * FROM teacher";
$member_run = mysqli_query($con,$member_info);
$row_teacher = mysqli_num_rows($member_run);

$member_non = "SELECT * FROM nonteaching";
$member_run = mysqli_query($con,$member_non);
$row_nonteacher = mysqli_num_rows($member_run);

$member_admin = "SELECT * FROM  adminis";
$member_admin = mysqli_query($con,$member_admin);
$row_admin = mysqli_num_rows($member_admin);

$member_alumni = "SELECT * FROM alumni";
$member_alu = mysqli_query($con,$member_alumni);
$row_alumni=mysqli_num_rows($member_alu);

$member_student = "SELECT * FROM scouncil";
$student_run = mysqli_query($con,$member_student);
$row_student=mysqli_num_rows($student_run);

$member_society = "SELECT * FROM society";
$society_run = mysqli_query($con,$member_society);
$row_society=mysqli_num_rows($society_run);

$member_local = "SELECT * FROM local";
$local_run = mysqli_query($con,$member_local);
$row_local = mysqli_num_rows($local_run);

$member_liberary = "SELECT * FROM liberary";
$liberary_run = mysqli_query($con,$member_liberary);
$row_liberary=mysqli_num_rows($liberary_run);

$member_gallery = "SELECT * FROM gallery";
$gallery_run = mysqli_query($con,$member_gallery);
$row_gallery=mysqli_num_rows($gallery_run);

$member_contact = "SELECT * FROM contact";
$contact_run = mysqli_query($con,$member_contact);
$row_contact=mysqli_num_rows($contact_run);

$email = $_SESSION['user_email'] ;

?>
<h3 class="text-center">Welcome </h3>
<h6 class="text-center"><?php echo $email; ?></h6>
<div class="list-group">
                  <a href="index.php" class="list-group-item active">
                   <i class="fa fa-tachometer"></i>  Dashboard
                  </a>
                  <a href="view_notice.php" class="list-group-item"><span class="badge"><?php echo $row_posts; ?></span><i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
 Notice</a>
                  <a href="view_teacher.php" class="list-group-item"><span class="badge"><?php echo $row_teacher; ?></span><i class="fa fa-square" aria-hidden="true"></i>
   Teachers</a>
                  <a href="view_nonteach.php" class="list-group-item"><span class="badge"><?php echo $row_nonteacher; ?></span><i class="fa fa-square" aria-hidden="true"></i>
   Non-teachers</a>
                  <a href="view_admin.php" class="list-group-item"><span class="badge"><?php echo $row_admin; ?></span><i class="fa fa-user"></i>   Administrative Staff</a>
                  <a href="view_alumni.php" class="list-group-item"><span class="badge"><?php echo $row_alumni; ?></span><i class="fa fa-thumbs-up" aria-hidden="true"></i>
   Alumni</a>
                  <a href="view_scouncil.php" class="list-group-item"><span class="badge"><?php echo $row_student; ?></span><i class="fa fa-user-plus" aria-hidden="true"></i>
   Student s Council</a>
                  <a href="view_wcom.php" class="list-group-item"><span class="badge"><?php echo $row_society; ?></span><i class="fa fa-user-circle-o" aria-hidden="true"></i>
   Working Comittee</a>
                  <a href="view_lcom.php" class="list-group-item"><span class="badge"><?php echo $row_local; ?></span><i class="fa fa-user-circle" aria-hidden="true"></i>
   Local manag. Comittee</a>
                  <a href="view_books.php" class="list-group-item"><span class="badge"><?php echo $row_liberary; ?></span><i class="fa fa-book" aria-hidden="true"></i>
   Books</a>
                  <a href="view_gallery.php" class="list-group-item"><span class="badge"><?php echo $row_gallery; ?></span><i class="fa fa-camera" aria-hidden="true"></i>
   Gallery</a>
                  <a href="view_message.php" class="list-group-item"><span class="badge"><?php echo $row_contact; ?></span><i class="fa fa-comment" aria-hidden="true"></i>
   Messages</a>
</div>