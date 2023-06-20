<?php
require_once "menu.php";
// session_start();

if (isset($_SESSION["id"])) {
  header("Location: index.php");
}

require_once "connection.php";

$usernameError = "*";
$passwordError = "*";
$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  if (empty($username)) {
    $usernameError = "Username can't be blank";
  }
  if (empty($password)) {
    $passwordError = "Password can't be blank";
  }
  if ($usernameError == "*" && $passwordError == "*") {
    $q = "SELECT * FROM `users` WHERE `username` = '$username'; ";
    $result = $conn->query($q);
    if ($result->num_rows == 0) {
      $usernameError = "This username doesn't exist!";
    } else {
      $row = $result->fetch_assoc();
      $dbPassword = $row["password"];
      if (!password_verify($password, $dbPassword)) {
        // wrong password
        $passwordError = "wrong password, try again!";
      } else {
        // username and password verified = success
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        header("Location: index.php");
      }
    }
  }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="login-message">
    <h1> Hop in and network!</h1>
  </div>


  <div class="login-container">

    <form action="#" method="POST">
      <p>
        <label for="username">Username:</label>
        <input nput type="text" name="username" id="username" value="">
        <span class="error">
          <?php echo $usernameError ?>
        </span>
      </p>
      <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <span class="error">
          <?php echo $passwordError ?>
        </span>
      </p>
      <p>
        <label for="submit"></label>
        <input type="submit" value="Login" name="submit">
      </p>
    </form>

  </div>


</body>

</html>