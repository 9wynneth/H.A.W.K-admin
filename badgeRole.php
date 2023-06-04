<?php
include 'connection.php';

// Retrieve the query from the AJAX request
$query = $_POST['query'];

// Execute the query
$result = $conn->query($query);

if (!$result) {
  // Error occurred, handle it appropriately (e.g., log, display error message)
  die("Error executing the query: " . $conn->error);
}

// Fetch the column names
$columns = array();
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $columns = array_keys($row);
}

// Fetch the data and store it in an array
$data = array();
if ($result->num_rows > 0) {
  do {
    $data[] = $row;
  } while ($row = $result->fetch_assoc());
}

// Close the connection
$conn->close();

$html = ""; // Initialize the $html variable
foreach ($data as $row) {
  foreach ($row as $value) {
    $html .= '<img src="assets/images/' . $value . '.png" style="width: 86px;">';
  }
}


// Return the HTML code
echo $html;
?>

<!-- Include the necessary DataTables library -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

