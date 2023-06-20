<?php
require_once "menu.php";
// session_start();
if (empty($_SESSION["id"])) {
  header("Location: index.php");
}
$id = $_SESSION["id"];
require_once "connection.php";


if (isset($_GET['friend_id'])) {
  // request to follow another user
  $friendId = $conn->real_escape_string($_GET["friend_id"]);

  $q = "SELECT * FROM `followers` 
      WHERE `id_sender` = $id
      AND `id_receiver` = $friendId";

  $result = $conn->query($q);
  if ($result->num_rows == 0) {
    $upit = "INSERT INTO `followers` (`id_sender`,`id_receiver`) 
           VALUE ($id, $friendId)";
    $result1 = $conn->query($upit);
  }
}

if (isset($_GET['unfriend_id'])) {
  // request to unfollow another user
  $friendId = $conn->real_escape_string($_GET["unfriend_id"]);

  $q = "DELETE FROM `followers` WHERE
  `id_sender` = $id AND
  `id_receiver` = $friendId;
";
  $conn->query($q);
}

// which users does loged in user follow
$upit1 = "SELECT `id_receiver` FROM `followers` WHERE `id_sender` = $id";
$res1 = $conn->query($upit1);
$niz1 = array();
while ($row = $res1->fetch_array((MYSQLI_NUM))) {
  $niz1[] = $row[0];
  // var_dump($niz1);
  // echo "<br>";
}
// set which users follow the logged in user
$upit2 = "SELECT `id_sender` FROM `followers` WHERE `id_receiver` = $id";
$res2 = $conn->query($upit2);
$niz2 = array();
while ($row = $res2->fetch_array((MYSQLI_NUM))) {
  $niz2[] = $row[0];
  // var_dump($niz2);
}

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
        ?>
        <!-- salje id korisnika u show_profile -->
        <a href="show_profile.php?p=<?php echo $row['id'] ?>">
          <?php echo $row["full_name"];
          ?>
        </a>

        <?php
      } else { ?>
        <a href="show_profile.php?p=<?php echo $row['id'] ?>">
          <?php echo $row["username"]; ?>
        </a>
      <?php }
      ?>
      <?php
      echo "</td><td>";
      // links for follow functionality
      $friendId = $row["id"];
      // sa casa 
      if (!in_array($friendId, $niz1)) {
        if (!in_array($friendId, $niz2)) {
          $text = "Follow";
        } else {
          $text = "Follow back";
        }
        echo "<a href='followers.php?friend_id=$friendId'>$text</a>";
      } else {
        echo "<a href='followers.php?unfriend_id=$friendId'>Unfollow</a>";
      }
      // end sa casa
      // follow || unfollow
      // moj kod - deprecated 
      // $followQuery = "SELECT `id` FROM `followers`
      //                 WHERE `id_sender` = $id
      //                 AND `id_receiver` = $friendId
      // ;";
      // $followQueryExecute = $conn->query($followQuery);
      // if ($followQueryExecute->num_rows == 0) {
      //   echo "<a href='followers.php?friend_id=$friendId'>Follow</a>";
      // } else {
      //   echo "<a href='followers.php?unfriend_id=$friendId'>Unfollow</a>";
      // }
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