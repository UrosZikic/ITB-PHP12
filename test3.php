<?php

if (isset($_POST['submit'])) {
  $x = $_POST['test'];
  echo $x;
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
    <input type="text" name="test" id="username">
    <input type="submit" name="submit">
  </form>
</body>

</html>