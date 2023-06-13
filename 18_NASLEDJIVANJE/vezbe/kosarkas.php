<?php
require_once "sportista.php";

class Kosarkas extends Sportista
{
  private $poeni;

  public function setPoeni($poeni)
  {
    $this->poeni = $poeni;
  }
  public function getPoeni()
  {
    return $this->poeni;
  }
  public function __construct($i, $p, $gr, $gradRodj, $poeni)
  {
    parent::__construct($i, $p, $gr, $gradRodj);
    $this->setPoeni($poeni);
  }
  public function ispisKosarkasa()
  {
    echo "Osoba " . $this->ime . " " . $this->prezime . ", rodjena je " . $this->godinaRodjenja . " godine, u gradu " . $this->getGradRodjenja() . " i u svojim utakmicama postigao je sledeci niz poena: ";
    foreach ($this->poeni as $poen) {
      echo $poen . ", ";
    }
  }
}
$poeni = [10, 20, 15, 20];
$k1 = new Kosarkas("Uros", "Zikic", 1998, "Zajecar", $poeni);
$k1->ispisKosarkasa();


?>