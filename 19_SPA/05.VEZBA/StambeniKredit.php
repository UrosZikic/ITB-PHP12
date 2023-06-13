<?php
require_once "AutoKredit.php";

class StambeniKredit extends AutoKredit
{
  public function mesecnaRata()
  {
    $mesecnaKamata = $this->getGodisnjaKamata() / 12 / 100;
    $stepen = pow(1 + $mesecnaKamata, $this->getBrGodOtplate() * 12);
    $mesecnaRata = ($this->getOsnovica() * $mesecnaKamata * $stepen) / ($stepen - 1);
    return $mesecnaRata;
  }
}


?>