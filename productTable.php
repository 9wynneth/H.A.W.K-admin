<?php
include 'connection.php';

// Cek apakah ada parameter "product_id" yang dikirim melalui metode GET
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];

  // Query SQL untuk menghapus data product berdasarkan ID
  $query = "DELETE FROM product WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $query);

  // Periksa apakah query berhasil dieksekusi
  if ($result) {
    // Redirect ke halaman productTable.html setelah menghapus data
    header('Location: productTable.html');
    exit;
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }
}

// Query SQL untuk mengambil data product
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
  // Tampilkan data product dalam bentuk tabel
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['product_id'] . '</td>';
    echo '<td>' . $row['product_name'] . '</td>';
    echo '<td>' . $row['product_description'] . '</td>';
    echo '<td>' . $row['product_brand'] . '</td>';
    echo '<td>' . $row['product_color'] . '</td>';
    echo '<td>' . $row['product_picture'] . '</td>';
    echo '<td>' . $row['product_quantity'] . '</td>';
    echo '<td>' . $row['product_price'] . '</td>';
    echo '<td>' . $row['anti_radiasi'] . '</td>';
    echo '<td>' . $row['product_status'] . '</td>';
    echo '<td>';
    echo '<button class="btn btn-primary btn-sm custom-btn" data-toggle="modal" data-target="#editModal" style="width: 70px; height: 40px;" title="Edit"><i class="fas fa-edit"></i></button>';
    echo '<button class="btn btn-danger btn-sm custom-btn" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="' . $row['product_id'] . '" style="width: 70px; height: 40px;" title="Delete"><i class="fas fa-trash"></i></button>';
    echo '</td>';
    echo '</tr>';
  }
} else {
  echo 'Error: ' . mysqli_error($conn);
}

if (isset($_POST['save_product'])) {
  // Memasukkan nilai-nilai dari form ke dalam variabel
  $product_name = $_POST['product_name'];
  $product_description = $_POST['product_description'];
  $product_category = $_POST['product_category'];
  $product_brand = $_POST['product_brand'];
  $product_color = $_POST['product_color'];
  $product_picture = $_POST['product_picture'];
  $product_quantity = $_POST['product_quantity'];
  $product_price = $_POST['product_price'];
  $anti_radiasi = $_POST['anti_radiasi'];
  $product_status = isset($_POST['product_status']) ? 1 : 0;

  // Menjalankan query INSERT untuk menyimpan data ke dalam database
  $query = "INSERT INTO product (product_name, category_id, product_description, product_brand, product_color, product_picture, product_quantity, product_price, anti_radiasi, product_status) VALUES ('$product_name', '$product_category', '$product_description', '$product_brand', '$product_color', '$product_picture', '$product_quantity', '$product_price', '$anti_radiasi', '$product_status')";
  $result = mysqli_query($conn, $query);


  // Mengalihkan pengguna ke halaman sukses atau memberikan pesan kesalahan
  if ($result) {
    // Execute JavaScript code to refresh the page after a delay
    echo '<script>
            window.location.href = "productTable.html";
          </script>';
    }

}
// Menutup koneksi database
mysqli_close($conn);
?>