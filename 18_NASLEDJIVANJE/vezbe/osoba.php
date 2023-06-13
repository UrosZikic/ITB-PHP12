<?php
class Osoba
{
  public $ime;
  public $prezime;
  public $godinaRodjenja;

  public function setIme($i)
  {
    $this->ime = $i;
  }
  // seteri
  public function setPrezime($p)
  {
    $this->prezime = $p;
  }
  public function setGodinaRodjenja($gr)
  {
    $this->godinaRodjenja = $gr;
  }
  // geteri
  public function getIme()
  {
    return $this->ime;
  }
  public function getPrezime()
  {
    return $this->prezime;
  }
  public function getGodinaRodjenja()
  {
    return $this->godinaRodjenja;
  }
  // konstruktor
  public function __construct($i, $p, $gr)
  {
    $this->setIme($i);
    $this->setPrezime($p);
    $this->setGodinaRodjenja($gr);
  }
  // metode
  public function ispis()
  {
    echo "Osoba " . $this->ime . " " . $this->prezime . ", rodjena je " . $this->godinaRodjenja . " godine.";
  }
}
// $o1 = new Osoba("Uros", "Zikic", 1998);
// $o1->ispis();


?>