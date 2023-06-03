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
$html = '<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4"></div><div class="row">
<div class="col-sm-12">
<table class="table table-striped table-bordered first dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">

<thead>
  <tr>';

foreach ($columns as $column) {
  $html .= '<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"  style="" aria-label="' . $column . ': activate to sort column descending">' . $column . '</th>';
}
$html .= '<th>Action</th>'; 

$html .= '</tr>
</thead>
<tbody>';

// Generate the HTML code for the table rows
foreach ($data as $row) {
  $html .= '<tr>';
  foreach ($row as $value) {
    $html .= '<td>' . $value . '</td>';
  }
  // Add the button in the last column
  $html .= '<td>
              <button class="btn btn-sm btn-outline-primary edit-button">
                <i class="fa fa-edit"></i> Edit
              </button>
            </td>';
  $html .= '</tr>';
}

$html .= '</tbody>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Your edit form goes here -->
        <form>
          <div class="card">
            <div class="card-header text-center">
              <span class="splash-description">Please add item here.</span>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <span class="product-name"> </span>
                </div>
                <div class="form-group">
                  <input class="form-control form-control-lg" id="quantity" type="number" placeholder="Qty" />
                </div>

              </form>
            </div>
  
          </div>
        </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>';

// Return the HTML code
echo $html;
?>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">



<!-- Initialize the DataTable -->
<script>
$(document).ready(function() {
  $('#DataTables_Table_0_wrapper').DataTable();
});
$(".edit-button").click(function() {
  var productName = $(this).closest("tr").find("td:first").text();
    $("#editModal .product-name").text(productName);
      $("#editModal").modal("show");
    });

</script>


