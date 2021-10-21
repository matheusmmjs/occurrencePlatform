<?php
/*session_start() or die('A sessão não pode ser iniciada');

if (!isset($_SESSION['id'])){
  header("Location: login.html");
}*/

$data = $_POST["date"];
printf($data);
$obs = $_POST["obs"];
printf($obs);
$value = $_POST["value"];
printf($value);
$condomino = $_POST["condomino"];
printf($condomino);
$status = $_POST["status"];
printf($status);
$hasInstallments = $_POST["hasInstallments"];
printf($hasInstallments);
$qtdInstallments = $_POST["qtdInstallments"];
printf($qtdInstallments);
$valueInstallments = $_POST["valueInstallments"];
printf($valueInstallments);

printf($_FILES["files"]);

/*$conn = new mysqli("localhost", "devwav39_admin", "admin@123", "devwav39_plataformaCRHR");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



mysqli_close($conn);*/
?>
