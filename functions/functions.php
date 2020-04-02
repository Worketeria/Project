<?php
$con = mysqli_connect("localhost","root","","worketeria");

//getting user ip address

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
  

function getpro(){
    if(!isset($_GET['cat'])){
        
       global $con;
      

       $get_pro = "SELECT * FROM work ORDER BY RAND()";

       $run_pro = mysqli_query($con, $get_pro);
      while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['work_id'];
        $pro_title = $row_pro['work_title'];
        $pro_city = $row_pro['work_city'];
        $pro_add = $row_pro['work_add'];
       

        echo "
        <div class='col-md-12 ftco-animate'>

        <div class='job-post-item bg-white p-4 d-block d-md-flex align-items-center'>

          <div class='mb-4 mb-md-0 mr-5'>
            <div class='job-post-item-header d-flex align-items-center'>
              <h2 class='mr-3 text-black h3'>$pro_title</h2>
              <div class='badge-wrap'>
               <span class='bg-primary text-white badge py-2 px-3'>Partime</span>
              </div>
            </div>
            <div class='job-post-item-body d-block d-md-flex'>
              <div class='mr-3' ><span class='icon-layers'></span> <a href='#'>$pro_add</a></div>
              <div><span class='icon-my_location'></span> <span>$pro_city</span></div>
            </div>
          </div>

          <div class='ml-auto d-flex'>
            <a href='job-single.php?pro_id=$pro_id' class='btn btn-primary py-2 mr-1'>View details</a>
            
              
            </a>
          </div>
        </div>
      </div>
        ";
        
        }
    }
}

function getCatPro(){

	if(isset($_GET['cat_id'])){
		
		$cat_id = $_GET['cat_id'];

	global $con; 
	
	$get_cat_pro = "select * from work where work_cat='$cat_id'";

	$run_cat_pro = mysqli_query($con, $get_cat_pro); 
	
  $count_cats = mysqli_num_rows($run_cat_pro);
  
  
  
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
	
      $pro_id = $row_cat_pro['work_id'];
      $pro_title = $row_cat_pro['work_title'];
      $pro_city = $row_cat_pro['work_city'];
      $pro_add = $row_cat_pro['work_add'];
	
    echo "
    

    <div class='col-md-12 ftco-animate'>

    <div class='job-post-item bg-white p-4 d-block d-md-flex align-items-center'>

      <div class='mb-4 mb-md-0 mr-5'>
        <div class='job-post-item-header d-flex align-items-center'>
          <h2 class='mr-3 text-black h3'>$pro_title</h2>
          <div class='badge-wrap'>
           <span class='bg-primary text-white badge py-2 px-3'>Partime</span>
          </div>
        </div>
        <div class='job-post-item-body d-block d-md-flex'>
          <div class='mr-3'><span class='icon-layers'></span> <a href='#'>$pro_add</a></div>
          <div><span class='icon-my_location'></span> <span>$pro_city</span></div>
        </div>
      </div>

      <div class='ml-auto d-flex'>
        <a href='job-single.php?pro_id=$pro_id' class='btn btn-primary py-2 mr-1'>View details</a>
        
          
        </a>
      </div>
    </div>
  </div>
		
		";
		
	
	}
	
}

}






?>