<?php
    $servername = "139.255.11.84";
    $user = "student";
    $pass = "isbmantap"; 
    $dbname = "ALP_HAWK";

    $conn = mysqli_connect($servername, $user, $pass, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
    }
?>