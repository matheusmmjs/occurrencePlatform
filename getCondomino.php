<?php
session_start() or die('A sessão não pode ser iniciada');

/*if (!isset($_SESSION['id'])){
  header("Location: login.html");
}*/

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli("localhost", "devwav39_admin", "admin@123", "devwav39_plataformaCRHR");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name FROM condominium";

$result = $conn->query($sql);

/* fetch associative array */
while ($row = $result->fetch_assoc()) {
  echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
}

mysqli_close($conn);
?>
