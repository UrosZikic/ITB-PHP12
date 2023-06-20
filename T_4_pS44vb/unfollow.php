<?php
// sender: log-in user
// receiver: profile accessed via url

session_start();
if (empty($_SESSION["id"])) {
  header("Location: index.php");
}
$id = $_SESSION["id"];
require_once "connection.php";

if (empty($_GET["friend_id"])) {
  header("Location: index.php");
}
$friendId = $conn->real_escape_string($_GET["friend_id"]);

$q = "DELETE FROM `followers` WHERE
  `id_sender` = $id AND
  `id_receiver` = $friendId;
";
$conn->query($q);

header("Location: followers.php");
?>