<?php

class Oblik
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
  public function obim()
  {
    return 0;
  }
  public function povrsina()
  {
    return 0;
  }

  public function ispis()
  {
    echo "<p> $this->nazivOblika, obim: " . $this->obim() . ", povrsina: " . $this->povrsina();
  }
}

?>