<?php
// BMI=kg / (height * height);
class Pacijent
{
  private $ime;
  private $visina;
  private $tezina;
  private $stanje;
  // get i set
  public function getIme()
  {
    return $this->ime;
  }
  public function getVisina()
  {
    return $this->visina;
  }
  public function getTezina()
  {
    return $this->tezina;
  }

  public function setIme($ime)
  {
    $this->ime = $ime;
  }
  public function setVisina($visina)
  {
    if ($visina * 100 >= 0 && $visina * 100 <= 250) {
      $this->visina = $visina;
    } else {
      if ($visina * 100 > 250) {
        $this->visina = 250;
      } else {
        $this->visina = 1;
      }

    }

  }
  public function setTezina($tezina)
  {
    if ($tezina >= 0 && $tezina <= 550) {
      $this->tezina = $tezina;
    } else {
      if ($tezina > 550) {
        $this->tezina = 550;
      } else {
        $this->tezina = 0;
      }
    }

  }

  // funkcije
  public function Stampaj()
  {
    $this->kritican() == true ? $this->stanje = "je kriticno" : $this->stanje = "nije kriticno";
    $bmi = intval($this->Bmi());

    echo "<p>" . "Pacijent " . $this->getIme() . " visok je " . $this->getVisina() . ", tezak je " . $this->getTezina() . " BMI je " . $bmi . " i stanje " . $this->stanje;
  }

  public function Bmi()
  {
    $bmi = $this->tezina / ($this->visina * $this->visina);
    return $bmi;
  }

  public function Kritican()
  {
    return $this->Bmi() < 15 || $this->Bmi() > 40;
  }
}


$p1 = new Pacijent();
$p1->setIme("Uros");
$p1->setVisina(1.6);
$p1->setTezina(560);
$p1->Stampaj();



?>