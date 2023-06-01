<?php
  $totalRevenue = 0;
  if (isset($totalRevenue)) {
    echo '<p class="display-7 font-weight-bold">';
    echo 'Total Revenue: <span class="text-primary d-inline-block">Rp ' . number_format($totalRevenue, 0, ',', '.') . '</span>';
    echo '</p>';
  }
?>