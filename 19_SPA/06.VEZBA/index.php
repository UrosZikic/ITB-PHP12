<?php
require_once "bSalary.php";
require_once "mSalary.php";

$b1 = new Bachelor("Uros", "English", 5);
echo $b1->ispis();
echo "<br>";
echo $b1->professorSalary();

$m1 = new Master("Milos", "Law", 10);
echo "<br>";
echo $m1->ispis();
echo "<br>";
echo $m1->professorSalary();

?>