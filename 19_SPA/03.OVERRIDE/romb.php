<?php

require_once "kvadrat.php";

class Romb extends Kvadrat
{
  private $ugao;

  public function getUgao()
  {
    $this->ugao;
  }
  public function setUgao($u)
  {
    if ($u > 0) {
      $this->ugao = $u;
    } else {
      $this->ugao = 0;
    }
  }
  public function povrsina()
  {
    return $this->getA() * $this->getA() * sin($this->ugao);
  }

  public function __construct($a, $u)
  {
    parent::__construct($a);
    // moze da preuzme iako direktno nenasledjuje Oblik:
    Oblik::__construct(Oblik::ROMB);
    $this->setUgao($u);
  }



}

?>