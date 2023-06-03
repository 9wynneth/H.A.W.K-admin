<?php
include 'connection.php';

// Retrieve the product name and quantity from the AJAX request
$productName = $_POST['product_name'];
$quantity = $_POST['product_quantity'];

// Update the stock column in the database
$query = "UPDATE product SET product_quantity = product_quantity + $quantity WHERE product_name = '$productName'";

if ($conn->query($query) === TRUE) {
  echo "Stock updated successfully.";
} else {
  echo "Error updating stock: " . $conn->error;
}

// Close the connection
$conn->close();
?>
