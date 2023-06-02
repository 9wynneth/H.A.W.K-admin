<?php
  include 'connection.php';
  
  // Fetch data from the database
  $sql = "SELECT date(od.order_detail_created) as order_detail_created, SUM(od.price * od.quantity) AS total_revenue 
  FROM order_detail od
  GROUP BY day(od.order_detail_created);";
  $result = $conn->query($sql);

  // Process the result and generate JSON
  $data = [];
  $totalRevenue = 0;
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $data[] = $row;
          $totalRevenue += $row['total_revenue'];
      }
  }

  // Close the database connection
  $conn->close();

  // Send the JSON response
  header('Content-Type: application/json');
  echo json_encode(['data' => $data, 'totalRevenue' => $totalRevenue]);
?>