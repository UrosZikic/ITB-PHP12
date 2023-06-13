<?php

$servername = "localhost";
$username = "admin";
$password = "admin123";
$db = "itbootcamp";


$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
  die("Nije uspela konekcija:" . $conn->connect_error);
}
;

?>