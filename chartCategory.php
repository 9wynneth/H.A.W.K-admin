<?php
include 'connection.php';


$sql = "SELECT c.category_name AS Category, SUM(od.quantity) AS sum
        FROM category c, order_detail od, product p
        WHERE c.category_id = p.category_id AND p.product_id = od.product_id
        GROUP BY c.category_name";
$result = $conn->query($sql);

// Create an array to store the data
$data = array();

// Fetch the data from the result set
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();

// Pass the data to JavaScript as a JSON object
echo json_encode($data);

?>