<!DOCTYPE html>
<?php
include("functions/functions.php");
include("includes/database.php");
session_start();




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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<style>
    @import url(http://fonts.googleapis.com/css?family=Lato:400,700);
body
{
    font-family: 'Lato', 'sans-serif';
    }
.profile 
{
    min-height: 355px;
    display: inline-block;
    }
figcaption.ratings
{
    margin-top:20px;
    }
figcaption.ratings a
{
    color:#f1c40f;
    font-size:11px;
    }
figcaption.ratings a:hover
{
    color:#f39c12;
    text-decoration:none;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 4px solid transparent;
    }
.emphasis:hover 
{
    border-top: 4px solid #1abc9c;
    }
.emphasis h2
{
    margin-bottom:0;
    }
span.tags 
{
    background: #1abc9c;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }
.dropdown-menu 
{
    background-color: #34495e;    
    box-shadow: none;
    -webkit-box-shadow: none;
    width: 250px;
    margin-left: -125px;
    left: 50%;
    }
.dropdown-menu .divider 
{
    background:none;    
    }
.dropdown-menu>li>a
{
    color:#f5f5f5;
    }
.dropup .dropdown-menu 
{
    margin-bottom:10px;
    }
.dropup .dropdown-menu:before 
{
    content: "";
    border-top: 10px solid #34495e;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: -10px;
    z-index: 10;
    }
    </style>

<body>
    <!-- navbar -->
    <div class="navbar">
        <nav class="nav__mobile"></nav>
        <div class="container">
            <div class="navbar__inner">
                <a href="index.php" class="navbar__logo">Worketeria </a>
                <nav class="navbar__menu">


                </nav>
                <div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
                                class=""></path>
                        </svg></a></div>
            </div>
        </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <?php
           if(isset($_GET['pro_id'])){

           $work_id = $_GET['pro_id'];
           $get_pro = "SELECT * FROM workers where worker_id='$work_id'";

           $run_pro = mysqli_query($con, $get_pro);
          while($row_pro = mysqli_fetch_array($run_pro)){
         
         
         $work_id = $row_pro['worker_id'];
         $work_contact = $row_pro['worker_contact'];
         $work_name = $row_pro['worker_name'];
         $work_add = $row_pro['worker_add'];
         
         $work_city = $row_pro['worker_city'];
         $work_job = $row_pro['worker_job'];
         $work_email = $row_pro['worker_email'];
         

        echo "
        <div class='col-md-3 sidebar ftco-animate'>
              <div class='sidebar-box'>
                 <div class='about-author d-flex p-4 bg-light'>
                      <div class='bio mr-5s'>
                          <img src='images/person_1.jpg' alt='Image placeholder' class='img-fluid mb-4'>
                      </div>
                   </div>
               </div>
          </div>
		<div class='col-md-offset-2 col-md-12 col-lg-offset-0 col-lg-6=10'>
    	 <div class='well profile'>
            <div class='col-sm-12'>
                <div class'col-xs-12 col-sm-8>
                    <h2>$work_name</h2>
                    <p><strong>About: </strong>$work_job </p>
                    <p><strong>Address: </strong>$work_add </p>
                    <p><strong>city: </strong>$work_city </p>
                    <p><strong>Email</strong>
                        <span class='tags'>$work_email</span> 
                       
                    </p>
                </div>             
                <div class='col-xs-12 col-sm-4 text-center'>
                    <figure>
                        <img src='http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png' alt='' class='img-circle img-responsive'>
                        <figcaption class='ratings'>
                            <p>Ratings
                            <a href='#'>
                                <span class='fa fa-star'></span>
                            </a>
                            <a href='#'>
                                <span class='fa fa-star'></span>
                            </a>
                            <a href='#'>
                                <span class='fa fa-star'></span>
                            </a>
                            <a href='#'>
                                <span class='fa fa-star'></span>
                            </a>
                            <a href='#'>
                                 <span class='fa fa-star-o'></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>            
            <div class='col-xs-12 divider text-center'>
                <div class='col-xs-12 col-sm-4 emphasis'>
                    
                </div>
                <div class='col-xs-12 col-sm-4 emphasis'>
                    
                </div>
                <div class='col-xs-12 col-sm-4 emphasis'>
                    
                </div>
            </div>
    	 </div>                 
		</div>
	
        
           

           ";
    
      }
   }
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/js/google-map.js"></script>
    <script src="js/js/main.js"></script>




</body>
<script src='js/app.min.js'></script>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eafcf4381d25c0e58488bb0/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

</html>

<?php
if(isset($_POST['apply'])){
	
	$ip = getIp();
   $w_id= $_POST['work_id'];
   $worker_id= $_POST['worker_id'];
   $work_email = $_POST['work_email'];


	 $insert_w = "INSERT INTO work_requests(work_id,worker_id,worker_email,worker_contact,worker_job,worker_name,work_email) values ('$w_id','$worker_id','$worker_email','$worker_contact','$worker_job','$worker_name','$work_email')";


		 $run_w = mysqli_query($con,$insert_w);
		 
		 if($run_w){
          echo "<script>alert('apply successfully')</script>";
       
		 }
}

?>