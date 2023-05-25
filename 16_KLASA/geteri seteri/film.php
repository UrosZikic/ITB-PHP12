<?php
class Film
{
  private $naslov;
  private $reziser;
  private $godinaIzdanja;

  public function setNaslov($naslov)
  {
    return $this->naslov = $naslov;
  }

  public function setReziser($reziser)
  {
    return $this->reziser = $reziser;
  }

  public function setGodinaIzdanja($gi)
  {
    if ($this->godinaIzdanja > 1800) {
      return $this->godinaIzdanja = $gi;
    } else {
      return $this->godinaIzdanja = 1800;
    }
  }

  public function getNaslov()
  {
    return $this->naslov;
  }
  public function getReziser()
  {
    return $this->reziser;
  }
  public function getGodinaIzdanja()
  {
    return $this->godinaIzdanja;
  }

  public function stampaj()
  {
    echo "<p> Naslov filma je " . $this->naslov . ", ime rezisera je " . $this->reziser . ", film je izasao godine " . $this->godinaIzdanja . "</p>";
  }
}

$f1 = new Film();
$f1->setNaslov("Shrek");
$f1->setReziser("Vicky Jenson");
$f1->setGodinaIzdanja(1799);
// echo $f1->getNaslov();
echo $f1->stampaj();

?>