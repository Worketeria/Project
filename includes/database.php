<?php

    $con = mysqli_connect("localhost","root","","worketeria");
    
    if(mysqli_connect_errno()){
        echo "the connection was not established",mysqli_connect_errno();
    }

?>
