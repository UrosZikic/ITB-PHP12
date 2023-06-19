<!DOCTYPE html>
<?php
// session_start();
require_once "connection.php";
require_once "validation.php";
require_once "menu.php";
$poruka = "";
if (isset($_GET["p"]) && $_GET["p"] == "ok") {
  $poruka = "You have successfully registered, please login to continue";
}


$username = "Anonymous";
if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
  $id = $_SESSION["id"];
  $row = profileExists($id, $conn);

  $m = "";
  if ($row === false) {
    // logged in user has no profile
    $m = "Create";
  } else {
    // loggedi nuser has a profile
    $m = "Edit";

    $username = $row["first_name"] . " " . $row["last_name"];
  }

}



?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Social Network</title>


</head>

<body>


  <div class="page-container">
    <div class="header-image">


    </div>

    <!-- slider ? slicice/pozadinska slika -->
    <div id="index-container">
      <div class="success"> <!-- zameniti nekim elementom iz bootstrapa -->
        <?php echo $poruka; ?>
      </div>
      <h1 id="header-title" style="color:white">Welcome,
        <?php echo $username; ?>, to our Social Network
      </h1>
      <?php if (!isset($_SESSION["username"])) { ?>
        <p>New to our site? <a href="register.php">Register here</a> and hop in!</p>
        <p>Already have an account? <a href="login.php">Login here</a> to continue to our site</p>
      <?php } else { ?>

        <p>
          <?php echo $m; ?> a <a href="profile.php">Profile</a>.
        </p>
        <p>See other members <a href="followers.php">here</a>.</p>
        <p><a href="logout.php">Logout </a>from our site.</p>
      <?php }
      ; ?>
    </div>
  </div>

</body>

</html>