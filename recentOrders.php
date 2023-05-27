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

// Generate the HTML code for the table
$html = '
<div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
  <div class="card">

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table">
          <thead class="bg-light">
            <tr class="border-0">';
            foreach ($columns as $column) {
              $html .= '<th>' . $column . '</th>';
            }
$html .= '
      </tr>
    </thead>
    <tbody>';
foreach ($data as $row) {
  $html .= '<tr>';
  foreach ($row as $value) {
    $html .= '<td>' . $value . '</td>';
  }
  $html .= '</tr>';
}
$html .= '
    </tbody>
  </table>';

// Return the HTML code
echo $html;
?>
