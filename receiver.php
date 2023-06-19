<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
  $username = $_GET["username"];

  echo $username;
}


?>