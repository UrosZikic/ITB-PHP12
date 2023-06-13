<?php
require_once "vozilo.php";
require_once "automobil.php";

$v = new Vozilo("a", "b", "c");
$v->ispis();


// echo $v->privatnoPolje; fatal error kad se pristupa privatnom polju
// echo $v->zasticenoPolje; ista greska za protected polje
// echo $v->javnoPolje; radi


$a = new Automobil("d", "e", "f", 5);
$a->ispis();
// $a->ispisAuta(); undefined property -> doesn't recognize private var
$a->ispisAuta();
?>