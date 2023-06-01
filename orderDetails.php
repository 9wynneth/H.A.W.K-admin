<?php
include 'connection.php';

if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];

  // Query untuk mencari order_detail dengan order_id yang sama
  $query = "SELECT product_id, quantity, price, quantity * price AS total FROM order_detail WHERE order_id = '$order_id'";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    // Menampilkan isi order_detail jika ditemukan
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['product_id'] . '</td>';
      echo '<td>' . $row['quantity'] . '</td>';
      echo '<td>' . $row['price'] . '</td>';
      echo '<td>' . $row['total'] . '</td>';
      echo '</tr>';
    }
  } else {
    echo '<tr>';
    echo '<td colspan="4">No order details found</td>'; // Pesan jika tidak ada order_detail yang ditemukan
    echo '</tr>';
  }
} else {
  echo '<tr>';
  echo '<td colspan="4">Invalid order ID</td>'; // Pesan jika order_id tidak valid atau tidak diberikan
  echo '</tr>';
}

mysqli_close($conn);
?>
