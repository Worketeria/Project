<!DOCTYPE html>

<?php
include("functions/functions.php");
include("includes/database.php");
session_start();

?>
<html lang="en">
  <head>
    <title>Worker Dashboard</title>
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
		<style>
		@import url('https://fonts.googleapis.com/css?family=Oldenburg');

html, body, div, span, applet, object, iframe,h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html { height: 101%; }
body { background: #dde9f0 url('https://i.imgur.com/p6YhOiv.png'); font-family: Arial, Tahoma, sans-serif; font-size: 62.5%; line-height: 1; padding-bottom: 65px; }

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong { font-weight: bold; } 

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }



p { font-size: 1.2em; font-weight: normal; line-height: 1.35em; color: #343434; margin-bottom: 12px; }

/* page container */
#wrap { display: block; width: 850px; margin: 0 auto; padding-top: 35px; }


/* user menu settings */
#dropdown { 
  display: block;
  padding: 13px 16px;
  width: 266px;
  margin: 0 auto;
  position: relative;
  cursor: pointer;
  font-size: 20px;
 
 -webkit-transition: all 0.15s linear;
  -moz-transition: all 0.15s linear;
  -ms-transition: all 0.15s linear;
  -o-transition: all 0.15s linear;
  transition: all 0.15s linear;
}
#dropdown:hover { color:#F5F5F5; }

#dropdown.open {
  background: #5a90e0;
  color: #fff;
  border-left-color: #6c6d70;
}

#dropdown ul { 
  position: absolute;
  top: 100%;
  left: -4px; /* move content -4px because of container left border */
  width: 266px;
  padding: 5px 0px;
  display: none;
  border-left: 4px solid #8e9196;
  background: #fff;
  -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  -moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}
#dropdown ul li { font-size: 0.9em; }

#dropdown ul li a { 
  text-decoration: none;
  display: block;
  color: #447dd3;
  padding: 7px 15px;
}
#dropdown ul li a:hover {
  color: #6fa0e9;
  background: #e7f0f7;
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
				<div id="dropdown" class="ddmenu">
         
        <?php
          
          echo "<i class='fa fa-user-circle' aria-hidden='true'></i>"."  "."  ".$_SESSION['worker_name'];
         ?>

        <ul>
        <li><a href="#">My Profile</a></li><br>
        <li><a href="#">Notification</a></li>
        <li><a href="#">Account Settings</a></li><br>
        <li><a href="log_out.php">Log Out</a></li>
      </ul>
    </div>
			</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>

    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/hero_bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<center><h1 class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great workers for your work!</h1></center>
            

						

			             

			            </div>
			          </div>
			          
			        </div>
		       </div>
        </div>
      </div>
   </div>
 </div><br>
 <br>
 
 <div class="cta cta--reverse">
		<div class="container">
    <h2 font><div class="cta__inner">
			
			
                <a href="#" class="button button__accent">Pending</a>
                <a href="#" class="button button__accent">History</a>
			</div></h2>
      <h2><a href="give_work_form.php" class="button button__accent">Book a service</a></h2>
		</div>
	</div>


  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



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
	<script>
$("#dropdown").on("click", function(e){
  e.preventDefault();
  
  if($(this).hasClass("open")) {
    $(this).removeClass("open");
    $(this).children("ul").slideUp("fast");
  } else {
    $(this).addClass("open");
    $(this).children("ul").slideDown("fast");
  }
});

</script>
    
  </body>
</html>