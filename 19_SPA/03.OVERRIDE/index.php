<?php
require_once "trougao.php";
require_once "kvadrat.php";
require_once "pravougaonik.php";
require_once "romb.php";

$k = new Kvadrat(3);
$p = new Pravougaonik(2, 4);
$t = new Trougao(4, 2, 5);
$r = new Romb(6, 15);

$oblici = [$t, $p, $k, $r];

foreach ($oblici as $oblik) {
  $oblik->ispis();
}


?>