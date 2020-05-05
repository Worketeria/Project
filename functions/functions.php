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

function fetch_user_chat_history($from_user_id, $to_user_id, $con)
{
	$query = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."'AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."') ORDER BY timestamp DESC";

$run_cats = mysqli_query($con, $query);
$output = '<ul class="list-unstyled">';
while($row=mysqli_fetch_array($run_cats))
{
  $user_name = '';
  $dynamic_background = '';
  $chat_message = '';
  if($row["from_user_id"] == $from_user_id)
  {
    if($row["status"] == '2')
    {
      $chat_message = '<em>This message has been removed</em>';
      $user_name = '<b class="text-success">You</b>';
    }
    else
    {
      $chat_message = $row['chat_message'];
      $user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success">You</b>';
    }
    

    $dynamic_background = 'background-color:#ffe6e6;';
  }
  else
  {
    if($row["status"] == '2')
    {
      $chat_message = '<em>This message has been removed</em>';
    }
    else
    {
      $chat_message = $row["chat_message"];
    }
    $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $con).'</b>';
    $dynamic_background = 'background-color:#ffffe6;';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
    <p>'.$user_name.' - '.$chat_message.'
      <div align="right">
        - <small><em>'.$row['timestamp'].'</em></small>
      </div>
    </p>
  </li>
  ';
}
	
  
	$output .= '</ul>';
	$query = "
	UPDATE chat_message 
	SET status = '0' 
	WHERE from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."' 
	AND status = '1'
	";
	$run_cats = mysqli_query($con, $query);

	return $output;
}

function get_user_name($user_id, $con)
{
	$query = "SELECT worker_name FROM worker WHERE worker_id = '$user_id'";
	$run_cats = mysqli_query($con, $query);

	while($row=mysqli_fetch_array($run_cats))
	{
		return $row['worker_name'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $con)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id' 
	";
	$run_c = mysqli_query($con, $query);
  $check_worker = mysqli_num_rows($run_c);
	$output = '';
	if($check_worker > 0)
	{
		$output = '<span class="label label-success">'.$check_worker.'</span>';
	}
	return $output;
}




?>