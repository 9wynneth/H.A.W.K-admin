<?php
// Start the session
session_start();

include 'connection.php';

// Initialize the variable to store user data
$userData = array();

// Check if the staffId session variable is set
if (isset($_SESSION["staffId"])) {
    // Retrieve the staff_id value from the session
    $staffId = $_SESSION["staffId"];

    // Prepare and execute the query
    $query = "SELECT * FROM staff WHERE staff_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $staffId);
    $stmt->execute();

    // Check if a user was found
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo "No user found.";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "User session not set.";
}

// Close the database connection
$conn->close();

// Return the user data as JSON
echo json_encode($userData);
?>
