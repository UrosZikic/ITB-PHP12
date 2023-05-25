<?php

class Auto
{
  //data
  var $marka;
  var $boja;
  var $imaKrov;


  // metode
  function sviraj()
  {
    echo "<p>Beep! Beep!</p>";
  }

  function ispis()
  {
    echo "<p> Automobil marke " . $this->marka . " boje " . $this->boja . " ima krov " . $this->imaKrov;
    if ($this->imaKrov == true) {
      echo "ima krov";
    } else {
      echo "nema krov";
    }
    echo "</p>";
  }
}

$a1 = new Auto();
$a1->marka = "Opel";
$a1->boja = "plava";
$a1->imaKrov = false;

$a2 = new Auto();
$a2->marka = "Peugot";
$a2->boja = "bela";
$a2->imaKrov = false;

$a3 = new Auto();
$a3->marka = "Audi";
$a3->boja = "siva";
$a3->imaKrov = false;

$a1->sviraj();
$a2->ispis();


?>