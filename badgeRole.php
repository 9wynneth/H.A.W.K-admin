<?php
// Retrieve the role value from the POST request
$role = $_POST['query'];

// Construct the image source based on the role value
$imageSrc = 'assets/images/' . strtolower($role) . '.png';

// Generate the HTML for the image
$html = '<img src="' . $imageSrc . '" style="width: 86px;">';

// Return the HTML code
echo $html;
?>
