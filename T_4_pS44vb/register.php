<?php
// access not allowed to signed in users
require_once "menu.php";
// session_start();
if (isset($_SESSION["id"])) {
  header("Location: index.php");
}

require_once "connection.php";
require_once "validation.php";

$usernameError = "";
$passwordError = "";
$retypeError = "";
$username = "";
$password = "";
$retype = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validates the existence of form method
  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);
  $retype = $conn->real_escape_string($_POST["retype"]);


  // implement user info validation

  //1. username
  $usernameError = usernameValidation($username, $conn);
  //2. password
  $passwordError = passwordValidation($password);
  //3. retype
  $retypeError = passwordValidation($retype);
  if ($password !== $retype) {
    $retypeError = "Passwords must match!";
  }
  //4.1 if all inputs are valid -> add new user
  if ($usernameError == "" && $passwordError == "" && $retypeError == "") {
    // password needs to be encrypted
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // insert query
    $q = "INSERT INTO `users`(`username`, `password`) 
    VALUES 
    ('$username', '$hash');
     ";
    if ($conn->query($q)) {
      // new user has been created and directed to login page
      header("Location: index.php?p=ok");
    } else {
      header("Location: error.php?" . http_build_query(['m' => "Error creating a user"]));
    }
  }
  //4.2 if invalid input exists, kill query and redirect back to the page

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register new user</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="register-container">
    <h1>Register to out site</h1>
    <!-- za domaci stilizuj formu -->
    <form action="#" method="post">
      <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $username ?>">
        <span class="error">
          *
          <?php echo $usernameError ?>
        </span>
      </p>
      <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="">
        <span class="error">
          *
          <?php echo $passwordError ?>
        </span>
      </p>
      <p>
        <label for="retype">Retype password:</label>
        <input type="password" name="retype" id="retype" value="">
        <span class="error">
          *
          <?php echo $retypeError ?>
        </span>
      </p>
      <p>
        <input type="submit" value="Create account">
      </p>
    </form>
  </div>
</body>

</html>