<?php

require_once "Trougao.php";

//$t->setA(6);
$t = new Trougao(3, 4, 5);

$t->setA(60); // kada pozivamo bilo koju drugu metodu koja nije konstruktor,
// OBJEKAT JE VEC KREIRAN (vec postoje sva polja za taj objekat!!!!)
// (60, 4, 5)

?>