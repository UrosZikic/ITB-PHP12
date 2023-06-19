<?php
mysqli_report(MYSQLI_REPORT_OFF); //helps header error execute
$server = "localhost";
$username = "uros";
$password = "15121714"; // promeni username i password za domaci
$database = "network";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
  header("location: error.php?m=" . $conn->connect_error); //elegantno resenje
  // 2 opcija je die("neuspela konekcija" . $conn->connect_error);
}

$conn->set_charset("utf8");
?>