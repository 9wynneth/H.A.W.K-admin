<?php
include 'connection.php';

$query = "SELECT p.product_brand AS product_brand,
      round((SUM(od.quantity) / (SELECT SUM(quantity) FROM order_detail) * 100),2)
       AS sold_percentage
FROM product p
JOIN order_detail od ON od.product_id = p.product_id
GROUP BY 1 ORDER BY 2 desc;";

$result = $conn->query($query);

if ($result) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $conn->close();

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Error executing the query: " . $conn->error;
}
?>
