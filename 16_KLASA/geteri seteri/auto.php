<?php
class Auto
{
  //data
  private $marka;
  private $boja;
  private $imaKrov;


  // metode

  //GETTER
  public function getMarka()
  {
    return $this->marka;
  }

  public function getBoja()
  {
    return $this->boja;
  }

  public function getImaKrov()
  {
    return $this->imaKrov;
  }

  public function setMarka($marka)
  {
    return $this->marka = $marka;
  }
  public function setBoja($boja)
  {
    return $this->boja = $boja;
  }

  public function setImaKrov($imaKrov)
  {
    if ($imaKrov === true || $imaKrov === false) {
      return $this->imaKrov = $imaKrov;
    } else {
      return $this->imaKrov = false;
    }
  }




  function sviraj()
  {
    echo "<p>Beep! Beep!</p>";
  }

  function ispis()
  {
    echo "<p> Automobil marke " . $this->marka . " boje " . $this->boja . " ima krov " . $this->imaKrov;
    if ($this->imaKrov == true) {
      echo "ima krov";
    } elseif ($this->imaKrov == false) {
      echo "nema krov";
    }
    echo "</p>";
  }
}

$a1 = new Auto();
// $a1->marka = 158; error

$a1->setMarka("Audi");
echo $a1->getMarka(); //returns data
echo $a1->ispis();

if ($a1->getImaKrov() == true) {
  echo "Automobil marke " . $a1->getMarka() . " ima krov <br>";
} else {
  echo "Automobil marke " . $a1->getMarka() . " nema krov <br>";
}
?>