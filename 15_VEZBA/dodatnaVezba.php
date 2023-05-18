<?php

$letovi2 = [
  array("dest" => "Belgrade", "country" => "Serbia", "time" => "18:00"),
  array("dest" => "Madrid", "country" => "Spain", "time" => "04:00"),
  array("dest" => "Berlin", "country" => "Germany", "time" => "15:00"),
  array("dest" => "Paris", "country" => "France", "time" => "14:00"),
  array("dest" => "Zagreb", "country" => "Croatia", "time" => "19:00"),
  array("dest" => "London", "country" => "England", "time" => "21:00"),
  array("dest" => "Dublin", "country" => "Ireland", "time" => "06:00"),
  array("dest" => "Athens", "country" => "Greece", "time" => "09:00"),
  array("dest" => "Rome", "country" => "Italy", "time" => "10:30"),
  array("dest" => "Oslo", "country" => "Norway", "time" => "12:45"),
];


foreach ($letovi2 as $let) {
  foreach ($let as $key => $value) {
    echo $key . $value . "<br>";
  }
}

$x = "06";
$y = intval($x);
echo $y;
echo 5 - 12;
?>