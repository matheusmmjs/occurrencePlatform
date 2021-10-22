<?php
session_start() or die('A sessão não pode ser iniciada');

if (!isset($_SESSION['id'])){
  header("Location: login.html");
}
$id = $_POST['id'];

$conn = new mysqli("localhost", "devwav39_admin", "admin@123", "devwav39_plataformaCRHR");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE occurrences SET active=2 WHERE id={$id}";

if($conn->query($sql)){
  header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>
