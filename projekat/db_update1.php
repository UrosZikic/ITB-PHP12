<?php
require_once "connection.php";

$queryAddBio = "ALTER TABLE `profiles`
                ADD COLUMN `bio` TEXT;";

if ($conn->query($queryAddBio)) {
  echo "SUCCESS";
} else {
  echo "FAILURE";
}
?>