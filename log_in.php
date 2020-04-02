<!DOCTYPE html>

<?php
session_start();//session start
include("includes/database.php");

?>

<html lang='en'>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Log in form</title>
	<link rel='stylesheet' href='css/style.min.css' />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
</head>
<body>
	<!-- navbar -->
	<div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.php" class="navbar__logo">Worketeria</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="sign_up.php">Sign up as a worker</a></li>
                        <li><a href="sign_up_customer.php">Sign up as a Customer</a></li>
						
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>
	<!-- Authentication pages -->
	<div class="auth">
		<div class="container">
			<div class="auth__inner">
				<div class="auth__media">
					<img src="./images/undraw_selfie.svg">
				</div>
				<div class="auth__auth">
					<h1 class="auth__title">Access your account</h1>
					<p>Fill in your email and password to proceed</p>
					<form method='post' action="" autocompelete="new-password" role="presentation" class="form">
						
						<label><b>username</b></label>
						<input type="text" name="username" id='username' placeholder="username" required>
						<label><b>Password</b></label>
						<input type="password" name="password" id='password' placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" autocomplete="off" required>
						<button type='submit' name="submit" class="button button__accent">Log in</button>
                        <a href=""><h6 class="align" >Forgot your password?</h6></a>
                        
					</form>
					
				</div>
			</div>
		</div>
	</div>
<script src='js/app.min.js'></script>
</body>
</html>
<?php

if(isset($_POST['submit'])){

	$c_name = $_POST['username'];
	$c_pass = $_POST['password'];

	//$sel_c = "select * from worker where worker_pass = '$c_pass' AND worker_name='$c_name'";

	$run_c = mysqli_query($con, "SELECT * FROM workers WHERE worker_name = '$c_name' AND worker_pass =  '$c_pass'" ) or die(mysqli_error($con));

	$check_worker = mysqli_num_rows($run_c);
	if($check_worker>0){
		$_SESSION['worker_name'] = $c_name;
        echo "<script>swal('Hello $c_name!', 'logged in succesfully!', 'success')</script>";
		header("Location:customer.php");
	}

	else{

		echo "<script>alert('password or username are incorrect,please try again')</script>";
		exit();
	}

	



}



?>