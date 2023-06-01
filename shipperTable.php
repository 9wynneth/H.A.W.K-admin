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
    echo '<button class="btn btn-primary btn-sm custom-btn edit-button" data-toggle="modal" data-target="#editModal" data-id="' . $row['shipper_id'] . '" data-name="' . $row['shipper_name'] . '" data-area="' . $row['shipper_area'] . '" data-phone="' . $row['shipper_phone'] . '"style="width: 70px; height: 40px;" title="Edit"><i class="fas fa-edit"></i></button>';
    echo '<button class="btn btn-danger btn-sm custom-btn" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="' . $row['shipper_id'] . '" style="width: 70px; height: 40px;" title="Delete"><i class="fas fa-trash"></i></button>';
    echo '</td>';
    echo '</tr>';
  }
} else {
  echo 'Error: ' . mysqli_error($conn);
}

if (isset($_POST['save_shipper'])) {
  // Memasukkan nilai-nilai dari form ke dalam variabel
  $shipper_name = $_POST['shipper_name'];
  $shipper_area = $_POST['shipper_area'];
  $shipper_phone = $_POST['shipper_phone'];
  $shipper_status = isset($_POST['shipper_status']) ? 1 : 0;

  // Menjalankan query INSERT untuk menyimpan data ke dalam database
  $query = "INSERT INTO shipper (shipper_name, shipper_area, shipper_phone, shipper_status) VALUES ('$shipper_name', '$shipper_area', '$shipper_phone', '$shipper_status')";
  $result = mysqli_query($conn, $query);


  // Mengalihkan pengguna ke halaman sukses atau memberikan pesan kesalahan
  if ($result) {
    // Execute JavaScript code to refresh the page after a delay
    echo '<script>
            window.location.href = "shipperTable.html";
          </script>';
    }

}

if (isset($_POST['shipperId']) && isset($_POST['shipperName'])) {
  $shipperId = $_POST['shipperId'];
  $shipperName = $_POST['shipperName'];
  $shipperArea = $_POST['shipperArea'];
  $shipperPhone = $_POST['shipperPhone'];

  // Perform the update query
  $query = "UPDATE shipper SET shipper_name = '$shipperName', shipper_area = '$shipperArea', shipper_phone = '$shipperPhone' WHERE shipper_id = '$shipperId'";
  $result = mysqli_query($conn, $query);

  // Check if the query was successful
  if ($result) {
    echo 'Shipper updated successfully'; // Return a success message
  } else {
    echo 'Error: ' . mysqli_error($conn); // Return an error message
  }
}

// Menutup koneksi database
mysqli_close($conn);
?>