<?php
include 'connection.php';

// Cek apakah ada parameter "category_id" yang dikirim melalui metode GET
if (isset($_GET['category_id'])) {
  $category_id = $_GET['category_id'];

  // Query SQL untuk menghapus data category berdasarkan ID
  $query = "DELETE FROM category WHERE category_id = '$category_id'";
  $result = mysqli_query($conn, $query);

  // Periksa apakah query berhasil dieksekusi
  if ($result) {
    // Redirect ke halaman categoryTable.html setelah menghapus data
    header('Location: categoryTable.html');
    exit;
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }
}

// Query SQL untuk mengambil data category
$query = "SELECT * FROM category";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
  // Tampilkan data category dalam bentuk tabel
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['category_id'] . '</td>';
    echo '<td>' . $row['category_name'] . '</td>';
    echo '<td>';
    echo '<button class="btn btn-primary btn-sm custom-btn edit-button" data-toggle="modal" data-target="#editModal" data-id="' . $row['category_id'] . '" data-name="' . $row['category_name'] . '" style="width: 70px; height: 40px;" title="Edit"><i class="fas fa-edit"></i></button>';
    echo '<button class="btn btn-danger btn-sm custom-btn" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="' . $row['category_id'] . '" style="width: 70px; height: 40px;" title="Delete"><i class="fas fa-trash"></i></button>';
    echo '</td>';
    echo '</tr>';
  }
} else {
  echo 'Error: ' . mysqli_error($conn);
}

if (isset($_POST['save_category'])) {
  // Memasukkan nilai-nilai dari form ke dalam variabel
  $category_name = $_POST['category_name'];
  $category_status = isset($_POST['category_status']) ? 1 : 0;

  // Menjalankan query INSERT untuk menyimpan data ke dalam database
  $query = "INSERT INTO category (category_name, category_status) VALUES ('$category_name','$category_status')";
  $result = mysqli_query($conn, $query);


  // Mengalihkan pengguna ke halaman sukses atau memberikan pesan kesalahan
  if ($result) {
    // Execute JavaScript code to refresh the page after a delay
    echo '<script>
            window.location.href = "categoryTable.html";
          </script>';
    }

}

// Check if the categoryId and categoryName are received through POST
if (isset($_POST['categoryId']) && isset($_POST['categoryName'])) {
  $categoryId = $_POST['categoryId'];
  $categoryName = $_POST['categoryName'];

  // Perform the update query
  $query = "UPDATE category SET category_name = '$categoryName' WHERE category_id = '$categoryId'";
  $result = mysqli_query($conn, $query);

  // Check if the query was successful
  if ($result) {
    echo 'Category updated successfully'; // Return a success message
  } else {
    echo 'Error: ' . mysqli_error($conn); // Return an error message
  }
}

// Menutup koneksi database
mysqli_close($conn);
?>