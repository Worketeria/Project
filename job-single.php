<!DOCTYPE html>
<?php
include("functions/functions.php");
include("includes/database.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
</head>
<body>
    <!-- navbar -->
	<div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.php" class="navbar__logo">Worketeria</a>
				<nav class="navbar__menu">
				
					
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>

   
<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
           <?php
           if(isset($_GET['pro_id'])){

           $work_id = $_GET['pro_id'];
           $get_pro = "SELECT * FROM work where work_id='$work_id'";

           $run_pro = mysqli_query($con, $get_pro);
          while($row_pro = mysqli_fetch_array($run_pro)){
         
         
         $detail_id = $row_pro['work_id'];
         $hirer_name = $row_pro['work_name'];
         $detail_title = $row_pro['work_title'];
         $detail_city = $row_pro['work_city'];
         $detail_add = $row_pro['work_add'];
         $detail_desc = $row_pro['work_details'];
         $detail_image = $_FILES['work_image']['name'];
        $detail_image_tmp = $_FILES['work_image']['tmp_name'];

        echo "
        <div class='col-md-8 ftco-animate'>
        <div class='mb-4 mb-md-0 mr-5'>
          <div class='job-post-item-header d-flex align-items-center'>
             <h2 class='mr-3 text-black h3'>$detail_title</h2>
              <div class='badge-wrap'>
                 <span class='bg-primary text-white badge py-2 px-3'>Partime</span>
              </div>
          </div>
          <div class='job-post-item-body d-block d-md-flex'>
             <div class='mr-3'><span class='icon-layers'></span> <a href='#'>$detail_add</a></div>
             <div><span class='icon-my_location'></span> <span>$detail_city</span></div>
          </div>
     </div>
      <br>
      <br>
      <p>$detail_desc</p>
      <p>
      <img src='work_image/$detail_image'  class='img-fluid'>
       </p>
      
      <center> 
        <div class='ml-auto d-flex'>
        <br><a href='#' class='btn btn-primary py-2 mr-1'>Apply for work</a>
        </div>
      </center>
   </div> 
           

           ";
    
      }
   }
   ?>
          
<?php
         echo "
          <div class='col-md-4 sidebar ftco-animate'>
              <div class='sidebar-box'>
                 <div class='about-author d-flex p-4 bg-light'>
                      <div class='bio mr-5'>
                          <img src='images/person_1.jpg' alt='Image placeholder' class='img-fluid mb-4'>
                      </div>
                      <div class='desc'>
                           <h3>$hirer_name</h3><h5><b>Address:</b></h5>
                           <p>$detail_add</p>
                      </div>
                   </div>
               </div>
          </div>
          ";
?>
        </div>
      </div>
    </section> <!-- .section -->

  <script src="js/js/jquery.min.js"></script>
  <script src="js/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/js/popper.min.js"></script>
  <script src="js/js/bootstrap.min.js"></script>
  <script src="js/js/jquery.easing.1.3.js"></script>
  <script src="js/js/jquery.waypoints.min.js"></script>
  <script src="js/js/jquery.stellar.min.js"></script>
  <script src="js/js/owl.carousel.min.js"></script>
  <script src="js/js/jquery.magnific-popup.min.js"></script>
  <script src="js/js/aos.js"></script>
  <script src="js/js/jquery.animateNumber.min.js"></script>
  <script src="js/js/bootstrap-datepicker.js"></script>
  <script src="js/js/jquery.timepicker.min.js"></script>
  <script src="js/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/js/google-map.js"></script>
  <script src="js/js/main.js"></script>

		

    
</body>
</html>