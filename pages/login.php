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
        // Retrieve the staff_id from the database result
        $row = $result->fetch_assoc();
        $staffId = $row["staff_id"];

        // Start the session
        session_start();
        // Set a session variable to store the staff_id
        $_SESSION["staffId"] = $staffId;

        // Username and password are correct, redirect to index.html
        header("Location: ../index.html");
        exit();
    } else {
        // Invalid username or password, redirect back to login.html and display error message
        header("Location: login.html?error=Invalid");
        exit();
    }

    if (isset($_POST["remember"])) {
        // Set session cookie duration to 2 hours (2 * 60 * 60 seconds)
        session_set_cookie_params(2 * 60 * 60);
        // Start the session
        session_start();
        // Set a session variable to indicate that the user is logged in
        $_SESSION["loggedIn"] = true;
    }

}
$conn->close();
?>
