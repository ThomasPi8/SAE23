<?php
$servername = "localhost";
    $phpusername = "smaurer3";
    $password = "Tprt12346";
    $DBname = "smaurer3_02";
    
    // Create connection
    $conn = new mysqli($servername, $phpusername, $password, $DBname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
?>