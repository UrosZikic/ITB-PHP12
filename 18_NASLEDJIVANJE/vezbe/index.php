<?php
require_once "zaposleni.php";

$o1 = new Zaposleni("Uros", "Zikic", 1998, 1000, "Ekonomista");
$o2 = new Zaposleni("Uros", "Zikic", 1998, 500, "Ekonomista");
$o3 = new Zaposleni("Uros", "Zikic", 1998, 700, "Ekonomista");
$o4 = new Zaposleni("Uros", "Zikic", 1998, 300, "Ekonomista");
$o5 = new Zaposleni("Uros", "Zikic", 1998, 3000, "Ekonomista");

$radnici = [
  $o1,
  $o2,
  $o3,
  $o4,
  $o5
];

function prosekPlate($radnici)
{
  $prosek = 0;
  foreach ($radnici as $radnik) {
    $prosek += $radnik->getPlata();
  }
  return $prosek / count($radnici);
}

function natprosecnaPlata($radnici)
{
  $prosek = prosekPlate($radnici);
  $randBr = rand(0, 4);

  return $radnici[$randBr]->getPlata() > $prosek ? true : false;

}
echo natProsecnaPlata($radnici);


?>