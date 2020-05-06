<?php

//fetch_user.php

include("functions/functions.php");
include("includes/database.php");
session_start();
$customer_id= $_SESSION['customer_id'];
$work_email = $_SESSION['customer_email'];

?>


<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Username</td>
        <th width="20%">email</td>
        <th width="20%">Contact no</td>
		<th width="10%">Action</td>
	</tr>
<?php

$query = "select * from work_requests where work_email='$work_email'";

$run_cats = mysqli_query($con, $query);

while($row=mysqli_fetch_array($run_cats))
{
    $worker_name = $row['worker_name'];
    $worker_id = $row['worker_id'];
    $worker_email = $row['worker_email'];
    $worker_contact = $row['worker_contact'];
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	echo"
	<tr>
		<td>$worker_name</td>
        <td>$worker_email</td>
        <td>$worker_contact</td>
		<td><a href='work_single.php?pro_id=$worker_id' class='btn btn-primary py-2 mr-1'>View details</a></td>
	</tr>
	";
}



?>