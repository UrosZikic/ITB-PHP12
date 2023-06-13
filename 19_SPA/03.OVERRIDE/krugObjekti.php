<?php
include "klasaKrug.php";

$k1 = new Krug(10);
$k2 = new Krug(20);
$k3 = new Krug(30);
echo $k1->obimKruga();
echo "<br>";
echo $k1->povrsinaKruga();
echo "<br>";
echo $k2->obimKruga();
echo "<br>";
echo $k2->povrsinaKruga();
echo "<br>";
echo $k3->obimKruga();
echo "<br>";
echo $k3->povrsinaKruga();


?>