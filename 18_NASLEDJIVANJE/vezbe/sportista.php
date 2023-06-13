<?php
require_once "osoba.php";

class Sportista extends Osoba
{
  private $gradRodjenja;


  public function setGradRodjenja($gradrodj)
  {
    $this->gradRodjenja = $gradrodj;
  }
  // seteri

  // geteri
  public function getGradRodjenja()
  {
    return $this->gradRodjenja;
  }

  // konstruktor
  public function __construct($i, $p, $gr, $gradRodj)
  {
    parent::__construct($i, $p, $gr);
    $this->setGradRodjenja($gradRodj);

  }

  public function ispisSportista()
  {
    echo "Osoba " . $this->ime . " " . $this->prezime . ", rodjena je " . $this->godinaRodjenja . " godine u gradu " . $this->gradRodjenja;
  }
}
$s1 = new Sportista("Uros", "Zikic", 1998, "Zajecar");
// $s1->ispisSportista();
?>