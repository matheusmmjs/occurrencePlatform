<?php
$email = $_POST['email'];
$logar = $_POST['logar'];
$password = md5($_POST['password']);

$connect = mysql_connect('localhost','devwav39_admin','admin@123');
$db = mysql_select_db('devwav39_plataformaCRHR');

  if (isset($logar)) {
    $verifica = mysql_query("SELECT * FROM users WHERE email =
    '$email' AND password = '$password'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else{
        setcookie("email", $email);
        header("Location:index.php");
      }
  }
