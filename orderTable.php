<?php
include 'connection.php';

$query = "SELECT o.order_id, concat(c.customer_firstName,' ',c.customer_lastName) as customer_name, o.shipper_id, o.shipper_date, o.shipper_address, o.order_quantity, o.order_grandtotal, o.order_updated FROM `order` o INNER JOIN `customer` c ON o.customer_id = c.customer_id ORDER BY o.shipper_date DESC";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
  // Tampilkan data shipper dalam bentuk tabel
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr data-toggle="modal" data-target="#orderDetailsModal" data-order-id="' . $row['order_id'] . '">';
    echo '<td>' . $row['order_id'] . '</td>';
    echo '<td>' . $row['customer_name'] . '</td>';
    echo '<td>' . $row['shipper_id'] . '</td>';
    echo '<td>' . $row['shipper_date'] . '</td>';
    echo '<td>' . $row['shipper_address'] . '</td>';
    echo '<td>' . $row['order_quantity'] . '</td>';
    echo '<td>' . $row['order_grandtotal'] . '</td>';
    
    // Cek nilai order_updated
    echo '<td>';
    if ($row['order_updated'] !== null) {
      echo '<span class="dot green"></span>';
      echo 'Delivered';
    } else {
      echo '<span class="dot red"></span>';
      echo 'On-process';
    }
    echo '</td>';
    echo '</tr>';
  }
} else {
  echo 'Error: ' . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
?>
