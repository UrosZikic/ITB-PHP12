<?php

class Kvadrat
{
  private $a;

  public function getA()
  {
    return $this->a;
  }

  public function setA($a)
  {
    if ($a > 0) {
      $this->a = $a;
    } else {
      $this->a = 0;
    }
  }

  public function __construct($a)
  {
    $this->setA($a);
  }

  public function obimKvadrata()
  {
    return 4 * $this->a;
  }

  public function povrsinaKvadrata()
  {
    return $this->a * $this->a;
  }
}

?>