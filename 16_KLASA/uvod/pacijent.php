<?php
// BMI=kg / (height * height);
class Pacijent
{
  var $ime;
  var $visina;
  var $tezina;
  var $stanje;
  function Stampaj()
  {
    $this->kritican() == true ? $this->stanje = "je kriticno" : $this->stanje = "nije kriticno";
    $bmi = intval($this->Bmi());

    echo "<p>" . "Pacijent " . $this->ime . " visok je " . $this->visina . ", tezak je " . $this->tezina . " BMI je " . $bmi . " i stanje " . $this->stanje;
  }

  function Bmi()
  {
    return $bmi = $this->tezina / ($this->visina * $this->visina);

  }

  function Kritican()
  {
    return $this->Bmi() < 15 || $this->Bmi() > 40;
  }
}

$milan = new Pacijent();
$milan->ime = "Milan";
$milan->visina = 1.8;
$milan->tezina = 80;

// echo $milan->Bmi();
echo $milan->Stampaj();
// echo $milan->Kritican(); //false

$dusan = new Pacijent();
$dusan->ime = "Dusan";
$dusan->visina = 1.65;
$dusan->tezina = 90;

// echo $dusan->Bmi();
echo $dusan->Stampaj();
// echo $dusan->Kritican(); // false

$andjela = new Pacijent();
$andjela->ime = "Andjela";
$andjela->visina = 1.9;
$andjela->tezina = 50;

// echo $andjela->Bmi();
echo $andjela->Stampaj();
// echo $andjela->Kritican(); // true

?>