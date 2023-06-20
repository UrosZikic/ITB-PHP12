<?php
require_once "menu.php";
require_once "validation.php";


$id = $_SESSION["id"];

$oldPassErr = $newPassErr = $repeatNewPassErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $oldPass = $conn->real_escape_string($_POST["old_pass"]);
  $newPass = $conn->real_escape_string($_POST["new_pass"]);
  $repeatNewPass = $conn->real_escape_string($_POST["repeat_new_pass"]);

  $oldPassErr = oldPassValidation($oldPass, $id, $conn);
  $newPassErr = passwordValidation($newPass);
  $repeatNewPassErr = passwordValidation($repeatNewPass);
  if ($newPass !== $repeatNewPass) {
    $repeatNewPassErr = "Passwords must match!";
  }
  if ($oldPassErr == "" && $newPassErr == "" && $repeatNewPassErr == "") {
    $hash = password_hash($newPass, PASSWORD_DEFAULT);
    $q = "UPDATE `users`
        SET `password` = '$hash'
        WHERE `id` = $id";
    if ($conn->query($q)) {
      // new user has been created and directed to login page
      header("Location: index.php?p=ok");
    } else {
      header("Location: error.php?" . http_build_query(['m' => "Error creating a user"]));
    }
  }


}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="#" method="post">
    <p>
      <label for="old_pass">Old password:</label>
      <input type="password" class="old-password" name="old_pass">
      <?php echo $oldPassErr; ?>
    </p>
    <p>
      <label for="new_pass">New password:</label>
      <input type="password" class="new-password" name="new_pass">
      <?php echo $newPassErr; ?>
    </p>
    <p>
      <label for="repeat_new_pass">Repeat new password:</label>
      <input type="password" class="repeaty-new-password" name="repeat_new_pass">
      <?php echo $repeatNewPassErr; ?>
    </p>

    <input type="submit" name="submit" value="reset password">
  </form>

</body>

</html>