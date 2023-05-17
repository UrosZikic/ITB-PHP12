<?php 
// 1
// $i = 1;

// while ($i <= 20) {
//   echo $i . "<br>";
//   $i++;
// }

// 2
// $i = 20;

// while ($i >= 1) {
//   echo $i . "<br>";
//   $i--;
// }

// 3 - VEZBA
// $i = 1;

// while ($i <= 20) {
//   if ($i % 2 == 0) {
//   echo $i . "<br>";
 
//   }
//   $i++;
// }

// 4
// $i = 1;
// while ($i <= 20) {
//   $boja = "green";
//   if ($i % 2 == 0) {
//   $boja = "blue";
//   } elseif ($i % 3 == 0) {
//     $boja = "red";
//     } 
//    echo "<p style=color:$boja;>$boja paragraf</p>";
//   $i++;
// }

// 5 - VEZBA
// $i = 1;
// while ($i <= 10) {
//   $slika = "1";
//   if ($i % 2 == 0) {
//      $okvir = "solid";
//   } else {
//      $okvir = "dashed";
//   }
//    echo "<img src='images/$slika.jpg' style='width: 200px; height:100px; border: 5px $okvir green;'>";
//    $i++;
// }


// 6 
// $i = 0;
// $y = 0;
// while ($i <= 100) {
//   $y += $i;
//   $i++;
// }
// echo $y;

// 7
// $i = 1;
// $y = 0;
// $n = 25;
// while ($i <= $n) {
//   $y += $i;
//   $i++;
// }
// echo $y;

// 8
// $n = 34;
// $m = 99;
// $y = 0;
// while ($n <= $m) {
//   $y += $n;
//   $n++;
// }
// echo $y;

// 9
// $n = 1;
// $m = 5;
// $y = 1;
// while ($n <= $m) {
//   $y *= $n;
//   $n++;
// }
// echo $y;

// 10
// $n = 1;
// $m = 10;
// $y = 1;
// $z = 1;
// while ($n <= $m) {
//  if ($n % 2 == 0) {
//   $y += pow($n, 2);
//  } else {
//   $z += pow($n, 3);
//  }
//  $n++;
// }
// echo $y;
// echo "<br />";
// echo $z;

// 11
// $k = 1;
// $m = 30;
// while ($k <= $m) {
//   if ($k % 2 == 0) {
//     if ($k % 3 == 0) {
//       if ($k % 5 == 0) {
//         echo "$k je deljiv sa 2, 3 i 5";
//         echo "<br />";
//       } else {
//         echo "$k je deljiv sa 2 i 3";
//         echo "<br />";
//       }
//     } elseif ($k % 5 == 0) {
//       echo "$k je deljiv sa 2 i 5";
//       echo "<br />";
//     } else {
//       echo "$k je deljiv sa 2";
//       echo "<br />";
//     }
//   } elseif ($k % 3 == 0) {
//       if ($k % 5 == 0) {
//         echo "$k je deljiv sa  3 i 5";
//         echo "<br />";
//       } else {
//         echo "$k je deljiv sa 3";
//         echo "<br />";
//       }
//   } else {
//     echo "$k je deljiv sa 5";
//     echo "<br />";
//   }
//   $k++;
// }

// 12
// $n = 2;
// $m = 100;
// while($n <= $m) {
//     if ($n == 2 || $n == 3 || $n == 5 || $n == 7) {
//     echo "<p>$n je prost broj </p>";
//     } elseif ($n % 2 !== 0 && $n % 3 !== 0 && $n % 5 !== 0 && $n % 7 !== 0) {
//       echo "<p>$n je prost broj </p>";
//     }
//   $n++;
// }

// drugi nacin 12.
// $k = 6;
// $i = 2;
// $prost = true;
// while ($i < $k) {
//   if ($k % $i == 0) {
//     $prost = false;
//     break;
//   } 
// }

// 13
$i = 1;
$b = 1;
$d = 20;
while ($i < 20) {
  if ($b < 10000) {  
  $b *= $d;
} elseif ($b > 10000) {
  break;
}
  $i++;
  $d--;


 
}
echo "<p style='color:green;'>$d</p>";
echo "<p style='color:red;'>$b</p>";

//13. ispravka
// $i = 20;
// $pro = 1;
// while ($i >= 1) {
//   $pro = $pro * $i;
//   if ($pro > 10000) {
   
//     break;
//   }
//   $i--;
// }

// echo "<p style='color:red;'>$i</p>";
// echo "<p style='color:red;'>$pro</p>";

// 14
$a = 5;
$b = 25;
$i = 0;
while ($a <= $b) {
 $a *= $a;
 $i++;
if ($a > $b) {
  echo "<p>broj je pomnozen samim sobom $i puta</p>";
  echo "Greska";
  break;
}
}

?>
