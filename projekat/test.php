<?php
if ($_SERVER["REQUEST METHOD"] = "POST") {
  $image = $_FILES["image"];
  $image_name = $image["name"];

  echo $image_name;
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
  <form action="#" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit">
  </form>
</body>

</html>