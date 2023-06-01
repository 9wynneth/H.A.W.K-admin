<?php
include 'connection.php';

// Query to retrieve the data
$query = "SELECT MONTH(order_updated) AS month, c.customer_gender, FORMAT(SUM(o.order_grandtotal), 0) AS total_revenue 
          FROM `order` o, customer c 
          WHERE c.customer_id = o.customer_id 
          GROUP BY month, c.customer_gender";

$result = mysqli_query($connection, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Convert the PHP array to JSON format
$data_json = json_encode($data);

// Send the JSON response
header('Content-Type: application/json');
echo $data_json;
?>
