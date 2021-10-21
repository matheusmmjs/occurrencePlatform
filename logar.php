<?php
$conn = new mysqli("localhost", "devwav39_admin", "admin@123", "devwav39_plataformaCRHR");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

$result = $conn->query($sql);

if($result->num_rows <= 0){
  echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
  exit;
} else{
  while ($dados = $result->fetch_assoc()){
    session_start();
    $_SESSION['id'] = $dados['id'];
    $_SESSION['name'] = $dados['name'];
    header("Location: index.php");
  }
}

mysqli_close($conn);
?>
