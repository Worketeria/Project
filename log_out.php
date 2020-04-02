<?php


session_start();
session_destroy();
unset($_SESSION['worker_name']);

header("location:/log_in.php");
?>
