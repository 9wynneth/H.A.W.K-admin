<?php
// Assuming you have a database connection established
// Replace the placeholders with your actual database credentials
$servername = "139.255.11.84";
$username = "student";
$password = "isbmantap";
$dbname = "ALP_HAWK";

// Retrieve the staff_id from the query parameter
$staffId = $_GET['staff_id'];

try {
  // Create a new PDO instance
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Prepare and execute the query
  $query = "SELECT sum(stock) AS totalAllocated FROM product_staff WHERE staff_id = :staffId";
  $statement = $pdo->prepare($query);
  $statement->bindParam(':staffId', $staffId);
  $statement->execute();

  // Fetch the result
  $result = $statement->fetch(PDO::FETCH_ASSOC);

  // Return the result as JSON
  header('Content-Type: application/json');
  echo json_encode($result);
} catch (PDOException $e) {
  // Handle any database errors
  http_response_code(500); // Internal Server Error
  echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>