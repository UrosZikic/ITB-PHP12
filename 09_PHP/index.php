<?php 
$a = '20' . 10;
echo gettype($a);


$h = 20;
$m = 35;
$rezultat = $h * 60 + $m;
echo $rezultat;

echo '<br>';
// zadatak 2

date_default_timezone_set('Europe/Belgrade');
$h2 = date('G');
$m2 = date('i');
echo 'Trenutno vreme je ' . $h2 . ' i ' . $m2;

$rezultat2 = $h2 * 60 + $m2;
echo $rezultat2;
?>