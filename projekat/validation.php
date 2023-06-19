<?php

function usernameValidation($u, $c)
{
  $query = "SELECT * FROM `users` WHERE `username` = '$u'";
  $result = $c->query($query);

  if (empty($u)) {
    return "Username cannot be blank";
  } elseif (preg_match('/\s/', $u)) {
    return "Username can't contain spaces";
  } elseif (strlen($u) < 5 || strlen($u) > 25) {
    return "Username can't have less than 5 or more than 25 characters";
  } elseif ($result->num_rows > 0) {
    return "Username is reserved, please choose another one";
  } else {
    return "";
  }
}

function passwordValidation($u)
{
  if (empty($u)) {
    return "Password cannot be blank";
  } elseif (preg_match('/\s/', $u)) {
    return "Password cannot have spaces";
  } elseif (strlen($u) < 5 || strlen($u) > 50) {
    return "Password can't have less than 5 or more than 50 characters";
  } else {
    return "";
  }
}

function nameValidation($n)
{
  $n = str_replace(' ', '', $n);
  if (empty($n)) {
    return "Name cannot be empty";
  } elseif (strlen($n) > 50) {
    return "Name cannot contain more than 50 characters";
  } elseif (preg_match("/^[a-zA-ZŠšĐđŽžČčĆć]+$/", $n) == false) {
    return "Name must contain only letters";
  } else {
    return "";
  }
}

function genderValidation($g)
{
  if ($g != "m" && $g != "f" && $g != "o") {
    return "Unknown gender";
  } else {
    return "";
  }
}

function dobValidation($d)
{
  if (empty($d)) {
    return "";
  }

  if ($d < "1900-01-01") {
    return "Date of birth not valid";
  } else {
    return "";
  }
}

function imageValidation($image)
{
  $counter = 0;
  $allowedExtension = ['.jpg', '.png', '.jpeg'];
  foreach ($allowedExtension as $exst) {
    if (str_contains($image, $exst) || $image == "") {
      $counter++;
    }
  }

  if ($counter < 1) {
    return "Error: wrong image format";
  } else {
    return "";
  }

}

function profileExists($id, $conn)
{
  $q = "SELECT * FROM `profiles` WHERE `user_id` = $id";
  $result = $conn->query($q);
  if ($result->num_rows == 0) {
    return false;
  } else {
    $row = $result->fetch_assoc();
    return $row;
  }
}


?>