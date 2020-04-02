<!DOCTYPE html>
<?php
include("functions/functions.php");
include("includes/database.php");

?>
<html lang='en'>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Worketeria</title>
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
					<li><a href="sign_up_customer.php">Sign up as a work hirer</a></li>
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
					<form  action= "sign_up.php" onsubmit="return validation()" method='post'  enctype="multipart/form-data" autocompelete="new-password" role="presentation" class="form"  >

					<!-- Username-->

						<label><b>Name</b></label>
						
						<input type ="text" id="user_name" name='name' class="fakefield" required>
						<span id="username"></span>
					<!-- email-->	
                        <input name="email" class="fakefield">
						<label><b>Email</b></label>
						<input type="text" name="email" id='emailid' placeholder="you@example.com">
						<span id="mail"></span>

					<!-- number-->


                        <label><b>Mobile no:</b></label>
						<input type="tel" name="number" id="contact" class="fakefield" required>
						<span id="contactNo"></span>

					<!-- Address-->	
                        <label for="add" ><b>Address:</b></label>
						<textarea id="add" name="user_add" required></textarea>

					<!-- City-->	
                        <label><b>City</b></label>
						<input type="text" name="city" class="fakefield" required>
						
					<!-- Bio-->	
						<label for="bio" ><b>Biography:</b></label>
						<textarea id="bio" name="user_bio"></textarea>

					<!-- Job role-->	
						<label for="job"><b>Job Role:</b></label>
						<select id="job" name="user_job" required>
								
						<?php

                        $get_cats = "select * from categories";

                        $run_cats = mysqli_query($con, $get_cats);

                        while($row_cats=mysqli_fetch_array($run_cats)){

                        $cat_id = $row_cats['cat_id'];
                        $cat_title = $row_cats['cat_title'];
                        echo"<option value='$cat_id'>$cat_title</option>";
                         }

                        ?>
						</select>
                       	<label><b>Profile photo</b></label>
                        <input type="file" name="profile" required>
						<label><b>Password</b></label>
						<input type="password" name="password" id='password' placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" autocomplete="off" required>
						
						<button type='submit' name="register" class="button button__accent">Sign up</button>
                        
					</form>
				</div>
			</div>
		</div>
	</div>
<script src='js/app.min.js'></script>
<script type="text/javascript">
  function validation()
  {
    var user = document.getElementById('user_name').value;
    var email = document.getElementById('email').value;
    var contact = document.getElementById('contact').value;
    
    if (user == "") {
      document.getElementById('username').innerHTML  =" **required";
      return false;
    }
    if(user.length < 2)
    {
      document.getElementById('username').innerHTML =" *your username must be more than one character";
      return false;
    }
    if(!isNaN(user))
    {
      document.getElementById('username').innerHTML =" *your username must be in character";
      return false;
    }
 if (email == "") {
      document.getElementById('mail').innerHTML  =" **Email-id is required";
      return false;
    }
    if(email.indexOf('@') <= 0)
    {
      document.getElementById('mail').innerHTML  =" **Invalid position of Email-id";
      return false;
    }
    if ((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.'))
    {
      document.getElementById('mail').innerHTML  =" **Invalid Email-id";
      return false;
    }
if (contact == "") {
      document.getElementById('contactNo').innerHTML  =" **required";
      return false;
    }
 if(isNaN(contact))
    {
      document.getElementById('contactNo').innerHTML  =" **only digits are allowed";
      return false;
    }
    if(contact.length!=10)
    {
      document.getElementById('contactNo').innerHTML  =" **enter 10 digits number";
      return false;
    }
 }
</script>

</body>
</html>

<?php
if(isset($_POST['register'])){
	
	$ip = getIp();
	$w_name = $_POST['name'];
	$w_email = $_POST['email'];
	$w_number = $_POST['number'];
	$w_add = $_POST['user_add'];
	$w_city = $_POST['city'];
	$w_bio = $_POST['user_bio'];
	$w_job = $_POST['user_job'];
	
	$w_pass = $_POST['password'];

	$w_image = $_FILES['profile']['name'];
	$w_image_tmp = $_FILES['profile']['tmp_name'];

	move_uploaded_file($w_image_tmp,"workers/workers_profile_pics/$w_image");

	 $insert_w = "INSERT INTO workers ( worker_ip , worker_name , worker_email , worker_contact , worker_add , worker_city , worker_biography ,worker_job ,worker_image, worker_pass) values ('$ip','$w_name','$w_email','$w_number','$w_add','$w_city','$w_bio','$w_job','$w_image','$w_pass')";


		 $run_w = mysqli_query($con,$insert_w);
		 
		 if($run_w){
			 echo "<script>swal('Hello $w_name!', 'Succesfully created account!', 'success')</script>";
		 }
}

?>