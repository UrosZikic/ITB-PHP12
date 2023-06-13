<?php
require_once "StambeniKredit.php";


$ak1 = new AutoKredit("kredit", 1000.5, 12.5, 12, 10.5);
$ak2 = new AutoKredit("kredit", 3000.7, 2.5, 2, 14.5);
$ak3 = new AutoKredit("kredit", 4200.3, 32.5, 20, 12.5);

$sk1 = new StambeniKredit("Kredit", 1000.5, 15.5, 20, 18.5);
$sk2 = new StambeniKredit("Kredit", 2000.3, 9.5, 10, 15.5);
$sk3 = new StambeniKredit("Kredit", 500.69, 22.5, 40, 12.5);

$krediti = [
  $ak1,
  $ak2,
  $ak3,
  $sk1,
  $sk2,
  $sk3
];

foreach ($krediti as $kredit) {
  echo $kredit->ispis();
}
foreach ($krediti as $kredit) {
  echo $kredit->mesecnaRata() . "<br>";
}




?>