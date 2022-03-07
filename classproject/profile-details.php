<?php
session_start();

include 'connection.php';

$id = $_SESSION['userid'];

//select data
$query_select = "select * from user_register where userid='$id' ";
$res = mysqli_query($conn, $query_select);
$row=mysqli_fetch_array($res);

//image upload
if(isset($_POST['img_upload']))
{

$img = $_FILES['img_file']['name'];
$temp = $_FILES['img_file']['tmp_name'];
move_uploaded_file($temp,'images/'.$img);
//image update
  $query_change_img = "update user_register set user_img='$img' where userid='$id' ";
  $result = mysqli_query($conn,$query_change_img);
  if($result)
  {
    echo 'uploaded';
  }
  else
  {
    echo 'not uploaded';
  }


}





?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">
<?php
include 'header.php';
?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">my account</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline dashboard-menu text-center">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="order.php">Orders</a></li>
          <li><a href="address.php">Address</a></li>
          <li><a class="active"  href="profile-details.php">Profile Details</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media">
            <div class="pull-left text-center" href="#!">
              <img class="media-object user-img" src="images/<?php echo $row['user_img'] ?>" alt="Image">
              <form action="profile-details.php" method="post" enctype="multipart/form-data">
              <input type="file" name="img_file" class="btn btn-transparent mt-20">
              <input type="submit" name="img_upload" class="btn btn-transparent mt-20 pull-left " value="change image"/>
</form>
            </div>
            <div class="media-body">
              <ul class="user-profile-list">


                <li><span>Full Name:</span> <?php  echo $row['fname']." ".$row['lname'] ?> </li>
                <li><span>Country:</span>USA</li>
                <li><span>Email:</span><?php  echo $row['email'] ?></li>
                <li><span>Username:</span> <?php  echo $row['username'] ?> </li>
                <li><span>Date of Birth:</span>Dec , 22 ,1991</li>
                <li><a href="update_profile.php">Edit Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include 'footer.php';
?>
    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>