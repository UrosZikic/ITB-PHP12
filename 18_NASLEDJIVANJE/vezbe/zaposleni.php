<?php
require_once "osoba.php";

class Zaposleni extends Osoba
{
  private $plata;
  private $pozicija;

  public function setPlata($pla)
  {
    $this->plata = $pla;
  }
  // seteri
  public function setPozicija($poz)
  {
    $this->pozicija = $poz;
  }
  // geteri
  public function getPlata()
  {
    return $this->plata;
  }
  public function getPozicija()
  {
    return $this->pozicija;
  }

  // konstruktor
  public function __construct($i, $p, $gr, $pla, $poz)
  {
    parent::__construct($i, $p, $gr);
    $this->setPlata($pla);
    $this->setPozicija($poz);
  }

  // metoda
  public function ispisZaposlenog()
  {

    echo "Osoba " . $this->ime . " " . $this->prezime . ", rodjena je " . $this->godinaRodjenja . " godine. Radi na poziciji" . $this->pozicija . " i zaradjuje " . $this->plata . " eura";
  }

}



?>