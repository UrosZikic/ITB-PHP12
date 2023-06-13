<?php
// klasa je abstraktna ako sadrzi bar jednu abstraktnu metodu
// posledica abstraktne klase je:
//1. ne mozemo vise kreirati objekte te klase. -> $o = new Oblik() nece raditi;
abstract class Oblik
{
  const TROUGAO = "Trougao";
  const PRAVOUGAONIK = "Pravougaonik";
  const KVADRAT = "Kvadrat";
  const ROMB = "Romb";
  private $nazivOblika;

  public function __construct($n)
  {
    $this->nazivOblika = $n;
  }
  public abstract function obim();
  // ako je metoda abstraktna, onda nema implementacije te metode u klasi
  //izvedene klase moraju da ponude implementaciju te metode!!!!

  public abstract function povrsina();


  public function ispis()
  {
    echo "<p> $this->nazivOblika, obim: " . $this->obim() . ", povrsina: " . $this->povrsina();
  }
}

?>