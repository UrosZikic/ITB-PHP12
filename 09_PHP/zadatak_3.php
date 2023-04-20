<?php 
$cena = 1400;
$nov = 2000;
$kusur = $nov - $cena;
echo '<br />';
echo "Kusur je " . $kusur;
echo '<br />';


// zadatak 4
$euro = 100;
$kursEur = 117.5;
$din = $euro * $kursEur;
echo '<br />';
echo "Vrednost u dinarama nakon konverzije " . $din;
echo '<br />';


// zadatak 5
$din = 10000;
$eur = $din / $kursEur;
echo '<br />';
echo "Vrednost u eurima nakon konverzije " . $eur;
echo '<br />';

// zadatak 6
$eur = 100;
$kursEurDin = 117.5;
$kursDolDin = 106.7;
$din = $eur * $kursEurDin;
$dol = $din / $kursDolDin;
echo '<br />';
echo "Vrednost u dolarami nakon konverzije " . $dol;
echo '<br />';


// zadatak 10
$cena = 70;
$popust = 20;
$cenaBezPopusta = $cena * 100 / (100 - $popust);
echo $cenaBezPopusta;
echo "<br />";

// zadatak 11
$n = 56;
$brojDana = $n / 3;
$brojNeiskoriscenihTableta = $n % 3;
echo floor($brojDana);

?>