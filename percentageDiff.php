<?php
include 'connection.php';

// Retrieve the data from the database
$query = "SELECT round(diff/(SELECT substr(format(sum(order_grandtotal), 0), 1, 6) FROM `order` WHERE MONTH(order_updated) = 5) *100,2) AS result FROM diffTotalRev";
$result = mysqli_query($connection, $query);

// Fetch the result
$data = mysqli_fetch_assoc($result);

// Return the result as JSON
echo json_encode($data);

// Close the database connection
mysqli_close($connection);
?>
