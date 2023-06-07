<?php
    $servername = "139.59.237.132";
    $user = "student";
    $pass = "isb-20232"; 
    $dbname = "ALP_HAWK";

    $conn = mysqli_connect($servername, $user, $pass, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
    }
?>