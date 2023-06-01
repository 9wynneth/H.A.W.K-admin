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

// Generate the HTML code for the table rows
$html = "";
foreach ($data as $row) {
  $taskId = $row['toDoID'];
  $taskName = $row['toDoName'];

  $html .= '<li class="list-group-item align-items-center drag-handle">';
  $html .= '<span class="drag-indicator"></span>';
  $html .= '<div>' . $taskName . '</div>';
  $html .= '<div class="btn-group ml-auto">';
  $html .= '<button class="btn btn-sm btn-outline-light delete-task" data-task-id="' . $taskId . '">';
  $html .= '<i class="fas fa-check"></i></button>';
  $html .= '</div></li>';
}

// Return the HTML code
echo $html;
?>
