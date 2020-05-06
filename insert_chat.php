<?php

//insert_chat.php

$connect = new PDO("mysql:host=localhost;dbname=worketeria;charset=utf8mb4", "root", "");
include("functions/functions.php");

session_start();

$data = array(
	':to_user_id'		=>	$_POST['to_user_id'],
	':from_user_id'		=>	$_SESSION['customer_id'],
	':chat_message'		=>	$_POST['chat_message']
	
);

$query = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message) VALUES (:to_user_id, :from_user_id, :chat_message)";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
	echo fetch_user_chat_history($_SESSION['customer_id'], $_POST['to_user_id'], $connect);
}


?>