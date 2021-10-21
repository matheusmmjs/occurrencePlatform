<?php
// Create connection
$conn = new mysqli("localhost", "devwav39_admin", "admin@123", "devwav39_plataformaCRHR");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>
