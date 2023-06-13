<?php

class Pravougaonik
{
  private $a;
  private $b;


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

  public function getB()
  {
    return $this->b;
  }

  public function setB($b)
  {
    if ($b > 0) {
      $this->b = $b;
    } else {
      $this->b = 0;
    }
  }

  public function __construct($a, $b)
  {
    $this->setA($a);
    $this->setB($b);
  }

  public function obimPravougaonika()
  {
    return 2 * ($this->a + $this->b);
  }

  public function povrsinaPravougaonika()
  {
    return $this->a * $this->b;
  }

}

?>