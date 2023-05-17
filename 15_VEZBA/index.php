<?php
// 1
$letovi = array(
  "Beograd" => 25,
  "London" => 20,
  "Madrid" => 30,
  "Oslo" => 40,
  "Rome" => 15,
  "Athens" => 25,
  "Paris" => 30,
  "Berlin" => 20,
  "Zagreb" => 35,
  "Dublin" => 40,
);

// 2
function maxBrojPutnika($letovi)
{
  $najveciLet = 0;

  foreach ($letovi as $let => $brPutnika) {
    if ($najveciLet < $brPutnika) {
      $najveciLet = $brPutnika;
    }
  }
  return "<p>" . $najveciLet . "</p>";
}
echo maxBrojPutnika($letovi); // 40

// 3
function brojMax($letovi)
{
  $najveciLet = 0;
  $brojNajvecihLetova = 0;

  foreach ($letovi as $let => $brPutnika) {
    if ($najveciLet < $brPutnika) {
      $najveciLet = $brPutnika;
    }
  }

  foreach ($letovi as $let => $brPutnika) {
    if ($brPutnika == $najveciLet) {
      $brojNajvecihLetova++;
    }
  }

  return "<p>" . $brojNajvecihLetova . "</p>";
}
echo brojMax($letovi);

// 4
function prosek($letovi)
{
  $ukupanBrojPutnika = 0;
  $brojLetova = 0;
  $prosecniBrojPutnika = 0;

  foreach ($letovi as $let => $brPutnika) {
    $ukupanBrojPutnika += $brPutnika;
    $brojLetova++;
  }
  $prosecniBrojPutnika = $ukupanBrojPutnika / $brojLetova;

  return "<p>" . "Prosecan broj putnika koji su leteli sa Niskog aerodroma je " . $prosecniBrojPutnika . "</p>";
}
echo prosek($letovi);

// 5
function isplativ($letovi, $granica)
{
  $isplativ = 0;
  $neisplativ = 0;

  foreach ($letovi as $let => $brPutnika) {
    if ($brPutnika >= $granica) {
      $isplativ++;
    } else {
      $neisplativ++;
    }
  }

  if ($isplativ > $neisplativ) {
    return "true";
  } else {
    return "false";
  }
}
echo isplativ($letovi, 20);
echo "<br>";
// 6
function alarmantan($letovi, $granica)
{
  $neisplativ = 0;


  foreach ($letovi as $let => $brPutnika) {
    if ($brPutnika < $granica) {
      $neisplativ++;
    }
  }

  if ($neisplativ > 0) {
    return "true";
  } else {
    return "false";
  }
}
echo alarmantan($letovi, 10);

// 7
function dobreDestinacije($letovi)
{
  $ukupanBrojPutnika = 0;
  $brojLetova = 0;
  $prosecniBrojPutnika = 0;

  foreach ($letovi as $let => $brPutnika) {
    $ukupanBrojPutnika += $brPutnika;
    $brojLetova++;
  }
  $prosecniBrojPutnika = $ukupanBrojPutnika / $brojLetova;


  foreach ($letovi as $let => $brPutnika) {
    if ($brPutnika > $prosecniBrojPutnika) {
      echo "<p>" . $let . " je dobra destinacija" . "</p>";
    }
  }


}
dobreDestinacije($letovi);
?>

<?php
// 8
$letovi2 = [
  array("dest" => "Belgrade", "country" => "Serbia", "time" => "18:00"),
  array("dest" => "Madrid", "country" => "Spain", "time" => "04:00"),
  array("dest" => "Berlin", "country" => "Germany", "time" => "15:00"),
  array("dest" => "Paris", "country" => "France", "time" => "14:00"),
  array("dest" => "Zagreb", "country" => "Croatia", "time" => "19:00"),
  array("dest" => "London", "country" => "England", "time" => "21:00"),
  array("dest" => "Dublin", "country" => "Ireland", "time" => "06:00"),
  array("dest" => "Athens", "country" => "Greece", "time" => "09:00"),
  array("dest" => "Rome", "country" => "Italy", "time" => "10:30"),
  array("dest" => "Oslo", "country" => "Norway", "time" => "12:45"),
];

//9
function brojLetovaZaZemlju($letovi, $zemlja)
{
  $brojLetova = 0;
  for ($i = 0; $i < count($letovi); $i++) {
    if ($zemlja == $letovi[$i]["dest"]) {
      $brojLetova++;
    }
  }
  return "<p>" . "broj letova do destinacije " . $zemlja . " je " . $brojLetova . "</p>";
}
echo brojLetovaZaZemlju($letovi2, "Belgrade");


// 10
// $test = $letovi2[0];
// echo substr($test['time'], 0, 2) > 17 ? "true" : "false";
function visePrePodne($letovi)
{
  $letPrePodne = 0;
  $letPoslePodne = 0;
  $vremeLeta = [];

  for ($i = 0; $i < count($letovi); $i++) {
    // ovaj if blok proverava da li je vreme pre 12 ili posle 12
    if (str_contains(substr($letovi[$i]["time"], 0, 1), "0")) {
      array_push($vremeLeta, substr($letovi[$i]["time"], 1, 1));
    } else {
      array_push($vremeLeta, substr($letovi[$i]["time"], 0, 2));
    }
  }

  for ($i = 0; $i < count($vremeLeta); $i++) {
    if (12 > $vremeLeta[$i]) {
      $letPrePodne++;
    } else {
      $letPoslePodne++;
    }
  }
  return $letPrePodne > $letPoslePodne ? "true" : "false";
}
echo (visePrePodne($letovi2));

// 11
function ispisLetovaDoSada($letovi)
{
  $trSati = date("H");
  $trMinuti = date("i");
  $KonvertVreme = $trSati * 60 + $trMinuti;

  $vremeLeta = [];
  for ($i = 0; $i < count($letovi); $i++) {
    if (str_contains(substr($letovi[$i]["time"], 0, 1), "0")) {
      array_push($vremeLeta, substr($letovi[$i]["time"], 1, 1) * 60 + substr($letovi[$i]["time"], 3, 4));
    } else {
      array_push($vremeLeta, substr($letovi[$i]["time"], 0, 2) * 60 + substr($letovi[$i]["time"], 3, 4));
    }
  }
  for ($i = 0; $i < count($vremeLeta); $i++) {
    if ($vremeLeta[$i] < $KonvertVreme) {
      echo "<p>" . "let do destinacije " . $letovi[$i]["dest"] . " je vec poleteo" . "</p>";
    }
  }
}
(ispisLetovaDoSada($letovi2));

// 12
$crvenaZona = [
  "Belgrade",
  "London",
  "Paris",
];

function rizicniLetovi($letovi, $crvenaZona)
{

  for ($i = 0; $i < count($letovi); $i++) {
    if (in_array($letovi[$i]["dest"], $crvenaZona)) {
      echo "<p style='color:red'>" . " let do destinacije " . $letovi[$i]["dest"] . "je u crvenoj zoni" . "</p>";
    }
  }
}
rizicniLetovi($letovi2, $crvenaZona);


?>