<?php
// Database credentials
$servername = "139.255.11.84";
$username = "student";
$password = "isbmantap";
$dbname = "ALP_HAWK";

// Retrieve form data
$username = $_POST['username'];
$oldPassword = hash('sha256', $_POST['oldPassword']);
$newPassword = $_POST['newPassword'];

try {
  // Create a new PDO instance
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Verify old password
  $query = "SELECT staff_password FROM product_staff WHERE staff_id = :staffId";
  $statement = $pdo->prepare($query);
  $statement->bindParam(':staffId', $userData['staff_id']);
  $statement->execute();
  $row = $statement->fetch(PDO::FETCH_ASSOC);

  // Compare old password with the stored password
  if ($oldPassword === $row['staff_password']) {
    // Update staff_name and staff_password
    $updateQuery = "UPDATE staff SET staff_name = :username, staff_password = :newPassword WHERE staff_id = :staffId";
    $updateStatement = $pdo->prepare($updateQuery);
    $updateStatement->bindParam(':username', $username);
    $updateStatement->bindParam(':newPassword', $newPassword);
    $updateStatement->bindParam(':staffId', $userData['staff_id']);
    $updateStatement->execute();

    // Redirect to a success page or perform any other necessary actions
    header("Location: my-profile.html?success");
    exit();
  } else {
    // Old password does not match
    echo 'Error: ' . $e->getMessage();
    exit();
  }
} catch (PDOException $e) {
  // Handle any database errors
  echo 'Error: ' . $e->getMessage();
}
?>
