<?php
$dan = array(
  "Datum" => date("Y:n:j"),
  "Kisa" => true,
  "Sunce" => false,
  "Oblacno" => true,
  "temperatura" => [5, -6, 7, 10, 12, 14, 16, 18]
);

// 1
function prosecnaTemp($dan)
{
  $zbir = 0;
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    $zbir += $dan["temperatura"][$i];
  }
  $prosek = $zbir / count($dan["temperatura"]);
  return $prosek;
}
// echo prosecnaTemp($dan)

// 2
function natProsecnaTemp($dan)
{
  $zbir = 0;
  $brojac = 0;
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    $zbir += $dan["temperatura"][$i];
  }
  $prosek = $zbir / count($dan["temperatura"]);

  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    if ($dan["temperatura"][$i] > $prosek) {
      ++$brojac;
    }
  }
  return $brojac;
}
// echo natProsecnaTemp($dan);

// 3
function brojMaksMerenja($dan)
{
  $maks = 0;
  $brojac = 0;
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    if ($maks < $dan["temperatura"][$i]) {
      $maks = $dan["temperatura"][$i];
    }
  }

  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    if ($dan["temperatura"][$i] == $maks) {
      ++$brojac;
    }
  }

  return $brojac;
}
// echo brojMaksMerenja($dan);


// 4
function brojMerenjaIzmedju($dan, $min, $maks)
{

  $brojac = 0;

  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    if ($dan["temperatura"][$i] > 10 && $dan["temperatura"][$i] < 20) {
      $brojac++;
    }
  }
  return $brojac;
}
// echo brojMerenjaIzmedju($dan, 10, 20);

// 5
function natprosecnoTopaoDan($dan)
{
  $zbir = 0;
  $brojac = 0;
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    $zbir += $dan["temperatura"][$i];
  }
  $prosek = $zbir / count($dan["temperatura"]);
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    if ($dan["temperatura"][$i] > $prosek) {
      $brojac++;
    }
  }

  if ($brojac > count($dan["temperatura"]) / 2) {
    return "true";
  } else {
    return "false";
  }
}
// echo natprosecnoTopaoDan($dan);

//6
function ledenDan($dan)
{
  $brojac = 0;
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    $dan["temperatura"][$i] < 0 ? $brojac++ : false;
    $odg = $brojac > 0 ? "true" : "false";
  }
  return $odg;
}
// echo ledenDan($dan);

// 7
function tropskiDan($dan)
{
  $brojac = 0;
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    $dan["temperatura"][$i] < 24 ? $brojac++ : false;
    $odg = $brojac > 0 ? "true" : "false";
  }
  return $odg;
}
// 8
function nepovoljanDan($dan)
{
  $brojac = 0;

  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    if ($dan["temperatura"][$i] !== end($dan["temperatura"])) {
      if ($dan["temperatura"][$i + 1] - $dan["temperatura"][$i] >= 8) {
        $brojac++;
      }
    }

  }
  return $brojac > 0 ? "true" : "false";
}
// echo nepovoljanDan($dan);

// 9
function neuobicajenDan($dan)
{
  for ($i = 0; $i < count($dan["temperatura"]); $i++) {
    if (($dan["temperatura"][$i] < -5 && $dan['Kisa'] == true) || ($dan["temperatura"][$i] > 25 && $dan["Oblacno"] == true) || ($dan["Oblacno"] == true && $dan["Kisa"] == true && $dan["Sunce"] == true)) {
      return "true";
    } else {
      continue;
    }
  }

}
// echo neuobicajenDan($dan);

$test = [[1, 2], 3, 4];
// function flatten($test)
// {
//   $result = [];
//   foreach ($test as $element) {
//     if (is_array($element)) {
//       $result = array_merge($result, flatten($element));
//     } else {
//       array_push($result, $element);
//     }
//   }
//   return $result;
// }


// print_r(flatten($test));

function flatten($test)
{
  $result = [];
  foreach ($test as $array) {
    if (is_array($array)) {
      foreach ($array as $element) {
        array_push($result, $element);
      }
    } else {
      array_push($result, $array);
    }
  }
  return $result;
}
print_r(flatten($test));




?>