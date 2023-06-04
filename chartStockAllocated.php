<?php
include 'connection.php';

$sql = "SELECT s.staff_name, SUM(ps.stock) AS 'Total Stocks Allocated'
        FROM staff s left join product_staff ps
        on s.staff_id = ps.staff_id
        GROUP BY s.staff_id;";
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
