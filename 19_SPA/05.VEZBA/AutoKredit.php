<?php
require_once "Kredit.php";

class AutoKredit extends Kredit
{
  protected $autoKamata;
  //  double

  public function setAutoKamata($ak)
  {
    if (is_float($ak) && $ak > 0) {
      $this->autoKamata = $ak;
    } else {
      $this->autoKamata = 0;
      echo "<p>AutoKamata mora biti tip (float) </p>";
    }
  }
  public function getAutoKamata()
  {
    return $this->autoKamata;
  }
  public function __construct($n, $o, $gk, $bgo, $ak)
  {
    parent::__construct($n, $o, $gk, $bgo);
    $this->setAutoKamata($ak);

  }

  public function ispis()
  {
    return "<p>" . $this->getNaziv() . " ima osnovicu " . $this->getOsnovica() . ", sa godisnjom kamatom od " . $this->getGodisnjaKamata() . " i auto kamatom od " . $this->autoKamata . ", kredit treba da se isplati za " . $this->getBrGodOtplate() . " godina." . "</p>";
  }
  public function mesecnaRata()
  {
    $kamata = $this->getOsnovica() * $this->getBrGodOtplate() * ($this->getGodisnjaKamata() + $this->autoKamata) / 100;
    $ukupanIznos = $this->getOsnovica() + $kamata;
    $mesecnaRata = $ukupanIznos / ($this->getBrGodOtplate() * 12);
    return $mesecnaRata;
  }
}

?>