<?php
require_once "auto.php";

// $v = new Vozilo();
// echo $v->voziVozilo();
// // $v->boja = "bela";

// $p = new Automobil();
// $p->voziAutomobil();

$v = new Vozilo("bela", "BMW");
$v->voziVozilo();

$a = new Automobil("zuta", "Peugeout");
$a->voziVozilo();
$a->voziAutomobil();

// $a->boja = "plava"; // moze samo u public

?>