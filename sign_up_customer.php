<!DOCTYPE html>

<?php
include("functions/functions.php");
include("includes/database.php");

?>

<html lang='en'>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Work hirer sign up form</title>
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
						<li><a href="log_in.php">Log in</a></li>

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
					<h1 class="auth__title">Creat your account</h1>
					<p>Fill in your Details to proceed</p>
					<form method='post' action="sign_up_customer.php" enctype="multipart/form-data" autocompelete="new-password" role="presentation" class="form">
                        <label><b>Name</b></label>
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

						<button type='submit' name="register" class="button button__accent">Sign up</button>

					</form>
				</div>
			</div>
		</div>
	</div>
<script src='js/app.min.js'></script>
</body>
</html>

<?php
if(isset($_POST['register'])){

	$ip = getIp();
	$c_name = $_POST['name'];
	$c_email = $_POST['email'];
	$c_number = $_POST['number'];
	$c_add = $_POST['user_add'];
	$c_city = $_POST['city'];


	$c_pass = $_POST['password'];




	 $insert_c = "INSERT INTO work_hirer ( customer_ip , customer_name , customer_email , customer_contact , customer_add , customer_city , customer_pass) values ('$ip','$c_name','$c_email','$c_number','$c_add','$c_city','$c_pass')";


		 $run_w = mysqli_query($con,$insert_c);

		 if($run_w){
			 echo "<script>swal('Hello $c_name!', 'Succesfully created account!', 'success')</script>";
		 }
}

?>
