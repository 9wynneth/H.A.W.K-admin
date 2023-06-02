<?php
include '../connection.php';

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
$html = '<table id="example3_wrapper" class="table table-striped table-bordered second dataTable" style="width: 100%">
<thead>
  <tr role="row">';
  
foreach ($columns as $column) {
  $html .= '<th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" style="width: 190.333px" aria-sort="ascending" aria-label="' . $column . ': activate to sort column descending">' . $column . '</th>';
}

$html .= '</tr>
</thead>
<tbody>';

// Generate the HTML code for the table rows
foreach ($data as $row) {
  $html .= '<tr>';
  foreach ($row as $value) {
    $html .= '<td>' . $value . '</td>';
  }
  $html .= '</tr>';
}

$html .= '</tbody>
</table>';

// Return the HTML code
echo $html;
?>

<!-- Include the necessary DataTables library -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<!-- Initialize the DataTable -->
<script>
$(document).ready(function() {
  $('#example3_wrapper').DataTable();
});
</script>
