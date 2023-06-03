<?php
// Start the session
session_start();

// Check if the staffId session variable is set
if (isset($_SESSION["staffId"])) {
    // Retrieve the staff_id value from the session
    $staffId = $_SESSION["staffId"];

    // Create an associative array to send back the staffId
    $response = array("staffId" => $staffId);

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
