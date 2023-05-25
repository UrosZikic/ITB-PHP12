<?php

class Brojevi
{
  private $broj1;
  private $broj2;
  // metode
  public function __construct($b1, $b2)
  {
    $this->broj1 = $b1;
    $this->broj2 = $b2;
  }
  // get i set
  public function getPrvi()
  {
    return $this->broj1;
  }
  public function getDrugi()
  {
    return $this->broj2;
  }
  public function setPrvi($p)
  {
    $this->broj1 = $p;
  }
  public function setDrugi($d)
  {
    $this->broj2 = $d;
  }
  // matematikaa
}

?>