<?php

class Film
{
  private $naslov;
  private $reziser;
  private $godinaIzdanja;
  private $ocena;

  public function __construct($n, $r, $g, $o)
  {
    $this->setNaslov($n);
    $this->setReziser($r);
    $this->setGodIzdanja($g);
    $this->setOcene($o);
  }

  public function setNaslov($n)
  {
    $this->naslov = $n;
  }
  public function getNaslov()
  {
    return $this->naslov;
  }

  public function setReziser($r)
  {
    $this->reziser = $r;
  }
  public function getReziser()
  {
    return $this->reziser;
  }
  public function setGodIzdanja($g)
  {
    $this->godinaIzdanja = $g;
  }
  public function getGodIzdanja()
  {
    return $this->godinaIzdanja;
  }

  public function setOcene($o)
  {
    $this->ocena = $o;
  }
  public function getOcene()
  {
    return $this->ocena;
  }
  public function stampaj()
  {
    echo "<p>Film $this->naslov, reziser $this->reziser, godina izdanja $this->godinaIzdanja, ocene: " . implode(", ", $this->ocena) . ", prosecna ocena: " . $this->prosek() . "</p>";
  }

  public function prosek()
  {
    $sum = 0;
    foreach ($this->ocena as $o) {
      $sum += $o;
    }
    $n = count($this->ocena);
    return ($n > 0) ? ($sum / $n) : 0;
  }



}


?>