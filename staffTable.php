<?php
include 'connection.php';

// Cek apakah ada parameter "staff_id" yang dikirim melalui metode GET
if (isset($_GET['staff_id'])) {
  $staff_id = $_GET['staff_id'];

  // Query SQL untuk menghapus data staff berdasarkan ID
  $query = "DELETE FROM staff WHERE staff_id = '$staff_id'";
  $result = mysqli_query($conn, $query);

  // Periksa apakah query berhasil dieksekusi
  if ($result) {
    // Redirect ke halaman staffTable.html setelah menghapus data
    header('Location: staffTable.html');
    exit;
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }
}

// Query SQL untuk mengambil data staff
$query = "SELECT * FROM staff";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
  // Tampilkan data staff dalam bentuk tabel
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['staff_id'] . '</td>';
    echo '<td>' . $row['staff_name'] . '</td>';
    echo '<td>' . $row['staff_role'] . '</td>';
    echo '<td>';
    echo '<button class="btn btn-primary btn-sm custom-btn" data-toggle="modal" data-target="#editModal" style="width: 70px; height: 40px;" title="Edit"><i class="fas fa-edit"></i></button>';
    echo '<button class="btn btn-danger btn-sm custom-btn" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="' . $row['staff_id'] . '" style="width: 70px; height: 40px;" title="Delete"><i class="fas fa-trash"></i></button>';
    echo '</td>';
    echo '</tr>';
  }
} else {
  echo 'Error: ' . mysqli_error($conn);
}

if (isset($_POST['save_staff'])) {
  // Memasukkan nilai-nilai dari form ke dalam variabel
  $staff_name = $_POST['staff_name'];
  $staff_role = $_POST['staff_role'];
  $staff_status = isset($_POST['staff_status']) ? 1 : 0;

  // Menjalankan query INSERT untuk menyimpan data ke dalam database
  $query = "INSERT INTO staff (staff_name, staff_role, staff_status) VALUES ('$staff_name', '$staff_role', '$staff_status')";
  $result = mysqli_query($conn, $query);


  // Mengalihkan pengguna ke halaman sukses atau memberikan pesan kesalahan
  if ($result) {
    // Execute JavaScript code to refresh the page after a delay
    echo '<script>
            window.location.href = "staffTable.html";
          </script>';
    }

}
// Menutup koneksi database
mysqli_close($conn);
?>