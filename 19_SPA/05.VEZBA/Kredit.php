<?php

abstract class Kredit
{
  protected $naziv;

  protected $osnovica;
  // double/float/decimala
  protected $godisnjaKamata;
  // dobule isto

  protected $brGodOtplate;

  // seteri
  public function setNaziv($n)
  {
    if (is_string($n)) {
      $this->naziv = $n;
    } else {
      echo "<p>Naziv mora biti u formatu (string)";
    }
  }
  public function setOsnovica($o)
  {
    if (is_float($o) && $o > 0) {
      $this->osnovica = $o;
    } else {
      $this->osnovica = 0;
      echo "<p>Osnovica mora biti u formatu (float)";
    }
  }
  public function setGodisnjaKamata($gk)
  {
    if (is_float($gk) && $gk > 0) {
      $this->godisnjaKamata = $gk;
    } else {
      $this->godisnjaKamata = 0;
      echo "<p>Godisnja kamata mora biti u formatu (float)";
    }
  }
  public function setBrGodOtplate($bgo)
  {
    if (is_int($bgo) && $bgo > 0) {
      $this->brGodOtplate = $bgo;
    } else {
      $this->brGodOtplate = 0;
    }
  }

  // geteri
  public function getNaziv()
  {
    return $this->naziv;
  }
  public function getOsnovica()
  {
    return $this->osnovica;
  }
  public function getGodisnjaKamata()
  {
    return $this->godisnjaKamata;
  }
  public function getBrGodOtplate()
  {

    return $this->brGodOtplate;
  }

  // konstruktor
  public function __construct($n, $o, $gk, $bgo)
  {
    $this->setNaziv($n);
    $this->setOsnovica($o);
    $this->setGodisnjaKamata($gk);
    $this->setBrGodOtplate($bgo);
  }

  public function ispis()
  {
  }
  public abstract function mesecnaRata();
}


?>