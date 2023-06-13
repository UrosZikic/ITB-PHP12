<?php
require_once "oblik.php";
class Kvadrat extends Oblik
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
    parent::__construct(Oblik::KVADRAT);
    $this->setA($a);
  }

  public function obim()
  {
    return 4 * $this->a;
  }

  public function povrsina()
  {
    return $this->a * $this->a;
  }

  // nema potrebe zbog oblik.php-a, proveri construct ovde
  // public function ispis()
  // {
  //   echo "<p> Kvadrat, obim: " . $this->obim() . ", povrsina: " . $this->povrsina();
  // }
}

?>