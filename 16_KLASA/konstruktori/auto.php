<?php
class Auto
{
  //data
  private $marka;
  private $boja;
  private $imaKrov;


  // metode

  // CONSTRUCTOR
  public function __construct($marka, $boja, $imaKrov)
  {
    $this->setMarka($marka);
    $this->setBoja($boja);
    $this->setImaKrov($imaKrov);
  }




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

    echo "<p> Automobil marke " . $this->marka . " boje " . $this->boja . " " . ($this->imaKrov ? "ima krov" : "nema krov");

  }
}

// hoisting ne radi// sa consturct parametri su must
$a1 = new Auto("BMW", "plava", false);

// $a1->setMarka("BMW");
// $a1->setBoja("plava");
// $a1->setImaKrov(false);

$a1->ispis();
?>