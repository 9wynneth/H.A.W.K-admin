<?php
include 'connection.php';

// Cek apakah ada parameter "shipper_id" yang dikirim melalui metode GET
if (isset($_GET['shipper_id'])) {
  $shipper_id = $_GET['shipper_id'];

  // Query SQL untuk menghapus data shipper berdasarkan ID
  $query = "DELETE FROM shipper WHERE shipper_id = '$shipper_id'";
  $result = mysqli_query($conn, $query);

  // Periksa apakah query berhasil dieksekusi
  if ($result) {
      // Redirect ke halaman shipperTable.html setelah menghapus data
      header('Location: shipperTable.html');
      exit;
  } else {
      echo 'Error: ' . mysqli_error($conn);
  }
}

// Query SQL untuk mengambil data shipper
$query = "SELECT * FROM shipper";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
  // Tampilkan data shipper dalam bentuk tabel
  while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td>' . $row['shipper_id'] . '</td>';
      echo '<td>' . $row['shipper_name'] . '</td>';
      echo '<td>' . $row['shipper_area'] . '</td>';
      echo '<td>' . $row['shipper_phone'] . '</td>';
      echo '<td>';
      echo '<button class="btn btn-primary btn-sm custom-btn" data-toggle="modal" data-target="#editModal" style="width: 70px; height: 40px;" title="Edit"><i class="fas fa-edit"></i></button>';
      echo '<a class="btn btn-danger btn-sm custom-btn" href="shipperTable.php?shipper_id=' . $row['shipper_id'] . '" style="width: 70px; height: 40px;" title="Delete"><i class="fas fa-trash"></i></a>';
      echo '</td>';
      echo '</tr>';
  }
} else {
  echo 'Error: ' . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
?>