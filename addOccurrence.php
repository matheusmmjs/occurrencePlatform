<?php
session_start() or die('A sessão não pode ser iniciada');

if (!isset($_SESSION['id'])){
  header("Location: login.html");
}

if($_POST["date"] != ''){
  $date = DateTime::createFromFormat('Y-m-d', $_POST["date"]);
  $dateNew = $date->format('d/m/Y');
}

$obs = $_POST["obs"];

$value = $_POST["value"];

$condomino = $_POST["condomino"];

$status = $_POST["status"];

$hasInstallments = $_POST["hasInstallments"];
$hasInstallments = 'on' ? 1 : 2;

$qtdInstallments = $_POST["qtdInstallments"];

$valueInstallments = $_POST["valueInstallments"];

$conn = new mysqli("localhost", "devwav39_admin", "admin@123", "devwav39_plataformaCRHR");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO occurrences (obs, value, date, idCondominium, status, hasInstallments,
valueInstallments, qtdInstallments)
VALUES ('$obs', '$value', '$dateNew', '$condomino', '$status', '$hasInstallments',
'$valueInstallments', '$qtdInstallments')";

$conn->query($sql);
$id = $conn->insert_id;

if ($id != '') {
  /*if($_FILES["files"] != ''){
    echo $_FILES["files"][0]['name'];
    $sql = array();
    foreach($_FILES["files"] as $key => $entry) {
      $fileBase64 = base64_encode(file_get_contents($entry));
      echo $fileBase64;
      $name = $conn->real_escape_string($entry['name']);
      echo $name;
      $sql[] = "({$name}, {$fileBase64}, {$id})";
      echo $sql;
    }

    $result = $conn->query('INSERT INTO attachment (name, attachment, idOccurrence) VALUES '.implode(',', $sql));

    if($result){
      header("Location: occurrence.php");

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  } else {
    header("Location: occurrence.php");
  }*/
  header("Location: occurrence.php");

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>
