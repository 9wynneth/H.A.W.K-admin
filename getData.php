<?php
include 'connection.php';

$sql = "SELECT c.category_name, SUM(od.quantity) AS total_sold
        FROM order_Detail od
        INNER JOIN product p ON p.product_id = od.product_id
        INNER JOIN category c ON c.category_id = p.category_id
        GROUP BY c.category_name";

$result = $conn->query($sql);

// Menyimpan hasil query dalam array
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'category_name' => $row['category_name'],
            'total_sold' => $row['total_sold']
        );
    }
}

// Menutup koneksi database
$conn->close();

// Mengatur header agar respons berupa JSON
header('Content-Type: application/json');

// Mengirimkan data sebagai respons JSON
echo json_encode($data);
?>
