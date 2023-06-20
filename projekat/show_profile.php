<?php
require_once "menu.php";

if (!isset($_GET["p"])) {
  header("Location: index.php");
}
// works

$p = $_GET["p"];



// extract profile details
$readProfileDetails = "SELECT `first_name`, `last_name`, `gender`, `dob`, `profile_image`, `bio` FROM `profiles` WHERE `user_id` = $p";
$executeRPD = $conn->query($readProfileDetails);
$row = $executeRPD->fetch_assoc();

// extract username
$extractUserName = "SELECT `username` FROM `users` WHERE `id` = $p";
$executeEUN = $conn->query($extractUserName);
$userRow = $executeEUN->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="profile-details">
    <p>User profile details:</p>
    <div class="profile-details--container">
      <table class="profile-table  <?php echo $row['gender'] ?>">
        <?php
        $profileInfoQuery = "SELECT * FROM `profiles` WHERE `user_id` = $p;";
        $exeProfileInfoQuery = $conn->query($profileInfoQuery);
        ?>
        <tr>
          <td>First Name</td>
          <td>
            <?php
            if (isset($row['first_name'])) {
              echo $row['first_name'];
            }
            ; ?>
          </td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>
            <?php
            if (isset($row['last_name'])) {
              echo $row['last_name'];
            } ?>
          </td>
        </tr>
        <tr>
          <td>Username</td>
          <td>
            <?php
            if (isset($userRow['username'])) {
              echo $userRow['username'];
            } ?>
          </td>
        </tr>
        <tr>
          <td>
            Birthday
          </td>
          <td>
            <?php
            if (isset($row['dob'])) {
              echo $row['dob'];
            } ?>
          </td>
        </tr>
        <tr>
          <td>
            Gender
          </td>
          <td>
            <?php
            if (isset($row['gender'])) {
              echo $row['gender'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>
            About me
          </td>
          <td>
            <?php
            if (isset($row['bio'])) {
              echo $row['bio'];
            } ?>
          </td>
        </tr>
      </table>
    </div>
    <a href="followers.php">Find other users</a>


</body>

</html>