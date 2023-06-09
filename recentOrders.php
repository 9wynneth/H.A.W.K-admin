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

$html = '
<thead class="bg-light">
  <tr class="border-0">';
  
// Generate the table header based on column names
$columns = array_keys($data[0]);
foreach ($columns as $column) {
  $html .= '<th class="border-0">' . $column . '</th>';
}

$html .= '
  </tr>
</thead>
<tbody>';

// Generate the table rows based on data
foreach ($data as $row) {
  $html .= '<tr>';
  foreach ($row as $value) {
    $html .= '<td>' . $value . '</td>';
  }
  $html .= '</tr>';
}

$html .= '
</tbody>';
// Return the HTML code
echo $html;
?>
