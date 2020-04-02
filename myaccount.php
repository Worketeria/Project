<!DOCTYPE html>

<?php
include("functions/functions.php");
include("includes/database.php");
session_start();
if(isset($_POST['update']))
{
  $wname = $_POST['name'];
  $wemail = $_POST['email'];
  $wnumber = $_POST['number'];
  $wadd = $_POST['user_add'];
  $wcity = $_POST['city'];
  $wbio = $_POST['user_bio'];
  $wjob = $_POST['user_job'];

  $wpass = $_POST['password'];



    echo "UPDATE workers SET worker_name='$wname',worker_email='$wemail',worker_contact='$wnumber',worker_add='$wadd',worker_city='$wcity',worker_biography='$wbio',worker_job='$' WHERE mid=$_GET[mid]";
$sql = mysqli_query($db,"UPDATE m_master SET stud_id='$stud_id',mname='$mname',email='$email',gender='$gender',mobile='$mobile',addr='$addr',sem='$sem',prog='$prog',password='$password' WHERE mid=$_GET[mid]") or die(mysqli_error($db));
$msg=$sql;
echo "Updated data successfully\n";

}

?>
<html lang="en">
  <head>
    <title>Worker Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel='stylesheet' href='css/style.min.css' />
    <link rel='stylesheet' href='css/style.min.css' />
    <link rel="stylesheet" href="css/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/css/animate.css">

    <link rel="stylesheet" href="css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/css/magnific-popup.css">

    <link rel="stylesheet" href="css/css/aos.css">

    <link rel="stylesheet" href="css/css/ionicons.min.css">

    <link rel="stylesheet" href="css/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/css/flaticon.css">
    <link rel="stylesheet" href="css/css/icomoon.css">
    <link rel="stylesheet" href="css/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<style>
		@import url('https://fonts.googleapis.com/css?family=Oldenburg');

    	.bs-example{
        	margin: 1000px;
          color:black;
        }
       .bs-example a{
         color:black;
       }


</style>
</head>
  <body>

    <!-- navbar -->
	 <div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.php" class="navbar__logo">Worketeria</a>
				<nav class="navbar__menu">
          <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light bg-light">

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarCollapse" class="collapse navbar-collapse">

                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                          <?php

                            echo "<i class='fa fa-user-circle' aria-hidden='true'></i>"."  "."  ".$_SESSION['worker_name'];
                           ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a href="myaccount.php" class="dropdown-item">My profile</a>
                            <a href="https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=dropdowns-within-navbar" class="dropdown-item">Notification</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="log_out.php"class="dropdown-item">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
			</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>

    <!-- END nav -->

    <!-- Authentication pages -->
  	<div class="auth">
  		<div class="container">
  			<div class="auth__inner">
  				<div class="auth__media">
  					<img src="./images/undraw_profile_pic_ic5t.svg" width="250px" height="250px" style="margin-top:-500px;">
  				</div>
  				<div class="auth__auth">
  					<h1 class="auth__title">Change your account</h1>
  					<p>Fill in your Details to proceed</p>
  					<form method='post' action="sign_up_customer.php" enctype="multipart/form-data" autocompelete="new-password" role="presentation" class="form">
                          <label align="left"><b>Name</b></label>
                          <input type="text" name="name" class="fakefield">

                          <input name="email" class="fakefield">
                          <label><b>Email</b></label>
                          <input type="text" name="email" id='email' placeholder="you@example.com">

                          <label><b>Mobile no:</b></label>
                          <input type="tel" name="number" class="fakefield">

                          <label for="add" ><b>Address:</b></label>
  						<textarea id="add" name="user_add"></textarea>

                          <label><b>City</b></label>
                          <input type="text" name="city" class="fakefield">

                          <label><b>Password</b></label>
  						<input type="password" name="password" id='password' placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" autocomplete="off">

  						<button type='submit' name="register" class="button button__accent">Save</button>

  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  <script src='js/app.min.js'></script>
  </body>
  </html>
