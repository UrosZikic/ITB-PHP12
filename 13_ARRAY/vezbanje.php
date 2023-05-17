<?php 
$arr = ['a', 'b', 'c', 'd', 'e'];
$arr2 = [5, 15, -4, 0, 11, -7, 9, 10];

// 1
// for ($i = 0; $i < count($arr); $i++) {
//   echo $arr;
// }

// 2
// $sum = 0;
// for ($i = 0; $i < count($arr2); $i++) {
//   $sum += $arr2[$i];
// }
// alt sum($arr2);

// 3
// $sum /= count($arr2);

// 4
// $max = $arr2[0];

// for ($i = 1; $i < count($arr2); $i++) {
//   $max = $max < $arr2[$i] ? $arr2[$i] : $max;
// }
// alt max($arr2);
// echo $max;


// 5
// $min = $arr2[0];
// for ($i = 1; $i < count($arr2); $i++) {
// $min = $min > $arr2[$i] ? $arr2[$i] : $min;
// }
// echo $min;
// alt min($arr2);

// 6 
// $max = $arr2[0];
// $indNum = 0;

// for ($i = 1; $i < count($arr2); $i++) {
//   $indNum = $max < $arr2[$i] ? $i : $indNum;
//   $max = $max < $arr2[$i] ? $arr2[$i] : $max;

// }
// alt echo array_search($max, $arr2);



// $arr2 = [5, 15, -4, 0, 11, -7, 9];
// 7
$sum = 0;
for ($i = 0; $i < count($arr2); $i++) {
   $sum += $arr2[$i];
  }

$avg = $sum / count($arr2);

$aboveAvg = 0;
for ($i = 0; $i < count($arr2); $i++) {
  if ($arr2[$i] > $avg) {
    ++$aboveAvg;
  }
}

// 8
$posSum = 0;
for ($i = 0; $i < count($arr2); $i++) {
  if ($arr2[$i] > 0) {
    $posSum += $arr2[$i];
  }
}

// 9
$posNum = 0;
for ($i = 0; $i < count($arr2); $i++) {
  if ($arr2[$i] % 2 == 0) {
    ++$posNum;
  }
}

// 10
$evenSum = 0;
for ($i = 0; $i < count($arr2); $i++) {
  if ($i % 2 == 0) {
    $evenSum += $arr2[$i];
  }
}
echo "<hr>";

// 11
for ($i = 0; $i < count($arr2); $i++) {
  echo $arr2[$i] * (-1);
}
echo "<hr>";

// 12
// odd value, even index
for ($i = 0; $i < count($arr2); $i++) {
 if ($arr2[$i] % 2 == 1 && $i % 2 == 0) {
  echo $arr2[$i] * (-1);
 }
}

echo "<hr>";

// 13
$evenCount = 0;
for ($i = 0; $i < count($arr2); $i++) {
  if ($arr2[$i] % 2 == 0 && $i % 2 == 1) {
    ++$evenCount;
    echo "<br>";
  }
}
echo "<hr>";
// 14
$arr3 = ["this", "is", "a", "string"];
for ($i = 0; $i < count($arr3); $i++) {
  echo strlen($arr3[$i]);
  echo "<br>";
}

// 15
// $arr3 = ["this", "is", "a", "string"];
$longestStr = $arr3[0];
for ($i = 0; $i < count($arr3); $i++) {
 $longestStr = mb_strlen($longestStr, "UTF-8") < strlen($arr3[$i]) ? $arr3[$i] : $longestStr; 
}
echo $longestStr;
echo "<hr>";

// 16
// $arr3 = ["this", "is", "a", "string"];
$totalStrLen = 0;
$counter = 0;
for ($i = 0; $i < count($arr3); $i++) {
 $totalStrLen += strlen($arr3[$i]);
}
$avgLen = $totalStrLen / count($arr3);

for ($i = 0; $i < count($arr3); $i++) {
  if (mb_strlen($arr3[$i], "UTF-8") > $avgLen) {
    ++$counter;
  }
}
echo $counter;
echo "<hr>";


// 17
// $arr3 = ["this", "is", "a", "string"];
//   var_dump(strpos("sredaa", "a"));
$counter = 0;
for ($i = 0; $i < count($arr3); $i++) {
  if (str_contains($arr3[$i], "a")) {
    ++$counter;
  }
}
echo $counter;

echo "<hr />";

// 17 second way
$counter = 0;
for ($i = 0; $i < count($arr3); $i++) {
  if (strpos($arr3[$i], "a") !== false) {
    ++$counter;
  }
}
echo $counter;

// 18
// $arr3 = ["this", "is", "a", "string"];
$counter = 0;
for ($i = 0; $i < count($arr3); $i++) {
  if (str_starts_with($arr3[$i], "a")  || str_starts_with($arr3[$i], "A")) {
    ++$counter;
  }
  // if (strpos($arr3[$i], "a") === 0 || str_starts_with($arr3[$i], "A")) {
  //   ++$counter;
  // }
}
echo $counter;

// 1 -assoc
$automobili = array("Audi A3" => 2004, "Opel Corsa" => 2018, "Astra" => 2016, "Peugeot" => 2006);
$trGod = Date("Y");
foreach($automobili as $marka => $godiste) {

  echo "<p>Automobil $marka proizveden $godiste. godine</p>";
  
}
echo "<hr>";

foreach($automobili as $marka => $godiste) {
  if ($trGod - $godiste > 10) {
  echo "<p>Automobil $marka proizveden $godiste. godine</p>";
  }
}

echo "<hr>";

foreach($automobili as $marka => $godiste) {
  if (str_contains($marka, "Opel") && $godiste > 2000) {
  echo "<p>Automobil $marka proizveden $godiste. godine</p>";
  }
}
echo "<hr>";
// 2
$osobe = array(
"Uros" => 1.75, 
"Vasilije" => 1.8, 
"Jovan" => 1.65, 
"Vesna" => 1.85, 
"Vanja" => 1.9,
"Marko" => 1.7,
"Ana" => 1.55,
"Vilijam" => 1.5);
//3
foreach($osobe as $osoba => $visina) {
  echo "<p>Osoba $osoba je visoka $visina metra</p>";
}

echo "<hr>";

//4
//pt1
$TotalHeight = 0;
foreach($osobe as $osoba => $visina) {
 $TotalHeight += $visina;
}
 $avgHeight = $TotalHeight / count($osobe);
//pt2
foreach($osobe as $osoba => $visina) {
  if ($visina > $avgHeight) {
    echo "<p>Osoba $osoba je natprosecno visoka.</p>";
  }
 }
 echo "<hr>";
//5
$maxheight = $osobe["Uros"];
foreach($osobe as $osoba => $visina) {
  if ($maxheight < $visina) {
    $maxheight = $visina;
  }
 }
 echo $maxheight;

 echo "<hr>";
//  6
foreach($osobe as $osoba => $visina) {
  if ($visina < $avgHeight && str_starts_with($osoba, "V")) {
    echo "<p>Osoba $osoba je ispod proseka.</p>";
  }
 }
 echo "<hr>";


// zadatak 3
$student = array(
  "Matematika" => 5,
  "Engleski" => 4,
  "Hemija" => 2,
  "Informatika" => 3,
  "Fizicko" => 4,
  "Biologija" => 5,
);
// 1
foreach($student as $predmet => $ocena) {
 echo "<p>Student ima ocenu $ocena iz predmeta $predmet</p>";
 }
 echo "<hr>";

// 2
$najvecaOcena = 1;
foreach($student as $predmet => $ocena) {
  if ($najvecaOcena < $ocena) {
    $najvecaOcena = $ocena;
  }
  }
foreach($student as $predmet => $ocena) {
  if ($najvecaOcena == $ocena) {
    echo "<p>Student ima najvecu ocenu $najvecaOcena iz predmeta $predmet</p>";
   }
  }
echo "<hr>";
// 3
$ZbirOcena = 0;
foreach($student as $predmet => $ocena) {
  $ZbirOcena += $ocena;
  }
$prosecnaOcena = $ZbirOcena / count($student);
foreach($student as $predmet => $ocena) {
  if ($prosecnaOcena < $ocena) {
    echo "<p>Student ima ocenu iznad proseka iz predmeta $predmet, $ocena</p>";
  }
  }


?>