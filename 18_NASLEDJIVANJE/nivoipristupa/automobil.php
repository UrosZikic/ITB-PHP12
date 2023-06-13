<?php

require_once "vozilo.php";

class Automobil extends Vozilo
{
  private $brojVrata;

  public function __construct($j, $z, $p, $bv)
  {
    // call constructor from vozilo.php
    parent::__construct($j, $z, $p);
    // 
    $this->brojVrata = $bv;
  }
  public function ispisAuta()
  {
    echo "<p> Automobil: " . $this->javnoPolje . " " . $this->zasticenoPolje .
      " "
      // . $this->privatnoPolje

      // . " "

      . $this->brojVrata

      . "</p>";
  }
}


?>