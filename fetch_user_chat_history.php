<?php

//fetch_user_chat_history.php

include("functions/functions.php");
include("includes/database.php");
session_start();


echo fetch_user_chat_history($_SESSION['customer_id'], $_POST['to_user_id'], $con);

?>