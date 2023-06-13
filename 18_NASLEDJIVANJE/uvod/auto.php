<?php

require_once "vozilo.php";

class Automobil extends Vozilo
{
  public function voziAutomobil()
  {
    echo "<p> Automobil u pokretu " . $this->tip . "</p>"; // protected i public rade 
  }
}
// $test = new Automobil();
// echo $test->voziVozilo();

?>