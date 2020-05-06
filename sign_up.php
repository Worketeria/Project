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
	<?php

$msg_name = $msg2_name = $w_name = $msg_email = $msg2_email = $msg2_number = $msg_number = $msg_add = $msg_city = $msg_job = $msg_pass =$msg_pic = $w_add = $w_bio = $w_city = $w_email = $w_job = $w_number = $w_pass = "";
$validname = false;
$validemail = false;
$validnumber = false;

if(isset($_POST['register'])){

	$name_subject = $_POST['full_name'];
	$email_subject = $_POST['email'];
	$contact_number = $_POST['number'];



	if(preg_match("/^([a-zA-Z' ]+)$/", $name_subject)){
		$validname = true;
	}

	if(preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email_subject)){
		$validemail = true;
	}
	if(preg_match('/^[0-9]{10}+$/', $contact_number)){
		$validnumber = true;
	}

	if(empty($_POST['full_name'])){
		$msg_name = "You must supply your name";
	}
	elseif($validname === false){
		$msg2_name = "Only alphabets and white space allowed in Name";
	}
	elseif(strlen($name_subject) < 3){
		$msg2_name = "Your name must be more than two character";
	}
    else{
		$w_name = $name_subject;
	}


	if(empty($_POST['email'])){
        $msg_email = "You must supply your email";
	}
	elseif($validemail === false){
	    $msg2_email = "Must be of valid email format";
	}
	else{
		$w_email = $email_subject;
		
	}


	if(empty($_POST['number'])){
		$msg_number = "You must supply your contact number";
	}
	elseif($validnumber === false){
		$msg2_number = "Must be 10 digit contact number and no character allowed";
	}
	else{
		$w_number = $contact_number;
	}


	if(empty($_POST['user_add'])){
		$msg_add = "You must provide address";
	}
	else{
		$w_add = $_POST['user_add'];
	}

	if(empty($_POST['city'])){
		$msg_city = "You must provide your city";
	}
	else{
		$w_city = $_POST['city'];
	}


	if(empty($_POST['user_job'])){
		$msg_job = "You must provide your job role";
	}
	else{
		$w_job = $_POST['user_job'];
	}


	if(empty($_POST['password'])){
		$msg_pass = "You must provide your password";
	}
	else{
		$w_pass = $_POST['password'];
	}
	

	if(empty($_FILES['profile']['name'])){
		$msg_pic = "You must provide your profile pic";
	}
	else{
		$w_image = $_FILES['profile']['name'];
	}

	
	$ip = getIp();
	$w_bio = $_POST['user_bio'];



	if($w_name && $w_email && $w_number && $w_add && $w_city && $w_job && $w_pass && $w_image){
	 	$insert_w = "INSERT INTO workers ( worker_ip , worker_name , worker_email , worker_contact , worker_add , worker_city , worker_biography ,worker_job ,worker_image, worker_pass) values ('$ip','$w_name','$w_email','$w_number','$w_add','$w_city','$w_bio','$w_job','$w_image','$w_pass')";
		
		 $run_w = mysqli_query($con,$insert_w);
}
}
	?>
	<style>
	.note {color: #ff0000}

	#abc {
width:100%;
height:100%;
opacity:.95;
top:0;
left:0;
display:none;
position:fixed;
background-color:#313131;
overflow:auto;
}

div#popupContact {
position:absolute;
left:50%;
top:17%;
margin-left:-202px;
font-family:'Raleway',sans-serif
}

h2 {
background-color:#FEFFED;
padding:20px 35px;
margin:-10px -50px;
text-align:center;
border-radius:10px 10px 0 0
}

hr {
margin:10px -50px;
border:0;
border-top:1px solid #ccc
}

.popupImg{
	margin-left:auto;
	margin-right:auto;
}

#submit {
text-decoration:none;
width:100%;
text-align:center;
display:block;
background-color:#FFBC00;
color:#fff;
border:1px solid #FFCB00;
padding:10px 0;
font-size:20px;
cursor:pointer;
border-radius:5px
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
					<img class="sign-up" src="./images/undraw_selfie.svg">
				</div>
				<div class="auth__auth">
					<h1 class="auth__title">Creat your account</h1>
					<p>Fill in your Details to proceed</p>
					<form action="sign_up.php" method='post'  enctype="multipart/form-data" autocompelete="new-password" role="presentation" class="form"  >

					<!-- Username-->

						<label><b>Full Name</b><span class="note">*</span>:</label>
						  <input type="text" name="full_name"  placeholder="Firstname Lastname" required autofocus="autofocus" value="
						  <?php if(empty($_POST['full_name'])){
							  echo "";
						  }
						 else{
						  echo $_POST['full_name'];
						  } ?>" > 

						<?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_name."</p>";
								 echo "<p class='note'>".$msg2_name."</p>";
							  } 
						?> 

					
					<!-- email-->	
                        <input name="email" class="fakefield">
						<label><b>Email</b><span class="note">*</span>:</label>
						<input type="text" name="email" id='emailid' placeholder="you@example.com" required value="
						  <?php if(empty($_POST['email'])){
							  echo "";
						  }
						 else{
						  echo $_POST['email'];
						  } ?>">

						<?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_email."</p>";
								 echo "<p class='note'>".$msg2_email."</p>";
							  } 
						?> 

					<!-- number-->
                        <label><b>Mobile no:</b><span class="note">*</span>:</label>
						<input type="tel" name="number" id="contact" class="fakefield" required value="
						  <?php if(empty($_POST['number'])){
							  echo "";
						  }
						 else{
						  echo $_POST['number'];
						  } ?>">

						<?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_number."</p>";
								 echo "<p class='note'>".$msg2_number."</p>";
							  } 
						?> 

					<!-- Address-->	
                        <label for="add" ><b>Address:</b><span class="note">*</span>:</label>
						<textarea id="add" name="user_add" required >
						  <?php if(empty($_POST['user_add'])){
							  echo "";
						  }
						 else{
						  echo $_POST['user_add'];
						  } ?>"</textarea>

						<?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_add."</p>";
							  } 
						?> 

					<!-- City-->	
                        <label><b>City</b><span class="note">*</span>:</label>
						<input type="text" name="city" class="fakefield" required value="
						  <?php if(empty($_POST['city'])){
							  echo "";
						  }
						 else{
						  echo $_POST['city'];
						  } ?>">

						<?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_city."</p>";
							  } 
						?> 
						
					<!-- Bio-->	
						<label for="bio" ><b>Biography:</b></label>
						<textarea id="bio" name="user_bio">
						  <?php if(empty($_POST['user_bio'])){
							  echo "";
						  }
						 else{
						  echo $_POST['user_bio'];
						  } ?></textarea>


					<!-- Job role-->	
						<label for="job"><b>Job Role:</b><span class="note">*</span>:</label>
						<select id="job" name="user_job" required value="
						  <?php if(empty($_POST['user_job'])){
							  echo "";
						  }
						 else{
						  echo $_POST['user_job'];
						  } ?>">
								
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

						<?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_job."</p>";
							  } 
						?> 


					<!-- Profile photo-->	

                       	<label><b>Profile photo</b><span class="note">*</span>:</label>
                        <input type="file" name="profile" required value="
						  <?php if(empty($_FILES['profile']['name'])){
							  echo "";
						  }
						 else{
						  echo $_FILES['profile']['name'];
						  } ?>">

                        <?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_pic."</p>";
							  } 
						?> 

					<!-- password-->	

						<label><b>Password</b><span class="note">*</span>:</label>
						<input type="password" name="password" id='password' placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" autocomplete="off" required value="
						  <?php if(empty($_POST['password'])){
							  echo "";
						  }
						 else{
						  echo $_POST['password'];
						  } ?>">

                       <?php
							if(isset($_POST['register'])){
								 echo "<p class='note'>".$msg_pass."</p>";
							  } 
						?> 
						<!--submit form-->
						<button type='submit' name="register" class="button button__accent">Sign up</button>
                        
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="abc">
<div id="popupContact">
<div id="popupImgDiv">
<img class="popupImg" src="images/popupImg.jpeg"
</div>
<hr>
<p style="text-align:center;color:hsl(243, 100%, 69%);">Welcome <?php echo $w_name ?>!</p>
<a href="log_in.php" id="submit">Login For Continue</a>


</div>
</div>

<script src='js/app.min.js'></script>


</body>
</html>

<?php

if($run_w){
	
	echo "<script>document.getElementById('abc').style.display = 'block';</script>";
}
?>
