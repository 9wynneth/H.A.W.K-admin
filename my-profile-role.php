<?php
// Start the session
session_start();

// Check if the staffRole session variable is set
if (isset($_SESSION["staffRole"])) {
    // Retrieve the staff_id value from the session
    $staffRole = $_SESSION["staffRole"];

    // Create an associative array to send back the staffRole
    $response = array("staffRole" => $staffRole);

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} else {
    // Redirect to the login page or display an error message
    header("Location: login.html");
    exit();
}
?>
