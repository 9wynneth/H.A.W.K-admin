<?php
// Assuming you have a MySQL database connection established
include '../connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Encrypt the password to match the stored encrypted password in the database
    $encryptedPassword = hash('sha256', $password);

    // Prepare and execute the query
    $sql = "SELECT * FROM staff WHERE staff_name = '$username' AND staff_password = '$encryptedPassword'";
    $result = $conn->query($sql);

    // Check if a matching user is found
    if ($result->num_rows == 1) {
        // Username and password are correct, redirect to index.html
        header("Location: ../index.html");
        exit();
    } else {
        // Invalid username or password, show an error message
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
