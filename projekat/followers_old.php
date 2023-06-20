<?php
require_once "menu.php";
// session_start();
if (empty($_SESSION["id"])) {
  header("Location: index.php");
}
$id = $_SESSION["id"];
require_once "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Members of Social Network</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1 class="followers-header" style="color: #fff">See other memebers from our site</h1>
  <?php
  $q = "SELECT `u`.`id`, `u`.`username`, concat(`p`.`first_name`, ' ', `p`.`last_name` ) AS `full_name`, `p`.`gender`, `p`.`profile_image` FROM `users` AS `u` 
      LEFT JOIN `profiles` AS `p`
      ON `u`.`id` = `p`.`user_id`
      WHERE `u`.`id` != $id
      ORDER BY `full_name`;
";
  $result = $conn->query($q);
  if ($result->num_rows == 0) {
    ?>
    <div class="error">No other users in database :/</div>
    <?php
  } else {

    echo "<table class='followers-info'>";
    echo "<tr><th>avatar</th><th>Name</th><th colspan='2'>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>";
      if (strlen($row["profile_image"]) > 0) {
        echo "<img src='profile_images/" . $row['profile_image'] . "' alt='profile image'  class='profile-image'>";

      } elseif (strlen($row["profile_image"]) <= 0) {
        if ($row["gender"] == "m") {
          $src = "man-outline";
          echo "<ion-icon name= '" . $src . "'></ion-icon>";
        } elseif ($row["gender"] == "f") {
          $src = "woman-outline";
          echo "<ion-icon name= '" . $src . "'></ion-icon>";
        } else {
          $src = "person-outline";
          echo "<ion-icon name= '" . $src . "'></ion-icon>";
        }
      } else {
        $src = "person-outline";
        echo "<ion-icon name= '" . $src . "'></ion-icon>";
      }
      echo "</td><td>";
      if ($row["full_name"] !== NULL) {
        echo $row["full_name"];
      } else {
        echo $row["username"];
      }
      echo "</td><td>";
      // links for follow functionality
      $friendId = $row["id"];
      // follow || unfollow
      $followQuery = "SELECT `id` FROM `followers`
                      WHERE `id_sender` = $id
                      AND `id_receiver` = $friendId
      ;";
      $followQueryExecute = $conn->query($followQuery);
      if ($followQueryExecute->num_rows == 0) {
        echo "<a href='follow.php?friend_id=$friendId'>Follow</a>";
      } else {
        echo "<a href='unfollow.php?friend_id=$friendId'>Unfollow</a>";
      }
      echo "</td></tr>";
      // end
    }
    echo "</table>";
  }

  ?>
  <p class="followers-link" style="color:white;">
    Return to <a href="index.php">home page</a>.
  </p>



  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>