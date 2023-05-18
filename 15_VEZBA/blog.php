<?php
$blogovi = array(
  array("title" => "gaming!", "likes" => 20, "dislikes" => 5),
  array("title" => "gaming!", "likes" => 9, "dislikes" => 12),
  array("title" => "nature", "likes" => 30, "dislikes" => 18),
  array("title" => "politics", "likes" => 15, "dislikes" => 25),
  array("title" => "movies", "likes" => 18, "dislikes" => 3),
  array("title" => "music", "likes" => 24, "dislikes" => 9),
);
// 1
function likeSum($blogovi)
{
  $sum = 0;
  foreach ($blogovi as $blog) {
    $sum += $blog["likes"];
  }
  return $sum;
}
// echo likeSum($blogovi)
// 2
function likeAvg($blogovi)
{
  $sum = 0;
  $i = 0;
  foreach ($blogovi as $blog) {
    $sum += $blog["likes"];
    $i++;
  }
  return $sum / $i;
}
// echo likeAvg(($blogovi))
// 3
function moreLikes($blogovi)
{
  foreach ($blogovi as $blog) {
    if ($blog["likes"] > $blog["dislikes"]) {
      echo $blog["title"] . "<br>";
    }
  }
}
// moreLikes($blogovi);
//4
function doubleLikes($blogovi)
{
  foreach ($blogovi as $blog) {
    if ($blog["likes"] > $blog["dislikes"] * 2) {
      echo $blog["title"] . "<br>";
    }
  }
}
// doubleLikes($blogovi);
// 5
function endsWithExclamation($blogovi)
{
  foreach ($blogovi as $blog) {
    if (str_contains($blog["title"], "!")) {
      echo $blog["title"] . "<br>";
    }
  }
}
// endsWithExclamation($blogovi);
// 6
function aboveLimit($blogovi, $granica)
{
  foreach ($blogovi as $blog) {
    if ($blog["likes"] > $granica) {
      echo $blog["title"] . "<br>";
    }
  }
}
// aboveLimit($blogovi, 16);
// 7
function keyWord($blogovi, $rec)
{
  $sum = 0;
  $i = 0;
  foreach ($blogovi as $blog) {
    if (str_contains($blog["title"], $rec)) {
      $sum += $blog["likes"];
      $i++;
    }
  }
  $sum /= $i;
  return $sum;
}
// echo keyWord($blogovi, "gaming")

// 8
function aboveAverage($blogovi)
{
  $sum = 0;
  $i = 0;
  foreach ($blogovi as $blog) {
    $sum += $blog["likes"];
    $i++;
  }
  $sum /= $i;
  foreach ($blogovi as $blog) {
    if ($blog["likes"] > $sum) {
      echo $blog["title"] . "<br>";
    }
  }
}
// aboveAverage($blogovi);
// 9
function belowAverage($blogovi)
{
  $sum = 0;
  $i = 0;
  foreach ($blogovi as $blog) {
    $sum += $blog["dislikes"];
    $i++;
  }
  $sum /= $i;
  foreach ($blogovi as $blog) {
    if ($blog["dislikes"] < $sum) {
      echo $blog["title"] . "<br>";
    }
  }
}
belowAverage($blogovi);
?>