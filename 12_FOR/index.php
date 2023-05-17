<?php 
// 1
// for ($i = 1; $i <= 20; $i++) {
//   echo "<p>$i</p>";
// }

// 2
// for ($i = 20; $i >= 1; $i--) {
//   echo "<p>$i</p>";
// }

// 3
for ($i = 1; $i <= 20; $i++) {
  if ($i % 2 == 0) {
    echo "<p>$i</p>";
  }
}
echo "<br>";

//4
for ($i = 5; $i <= 15; $i++) {
  echo "<p> $i postaje " . ($i * 2) . "</p>";
}

// 5
$sum = 0;
for ($i = 1; $i <= 100; $i++) {
 $sum += $i;
}
echo "<p>suma brojeva od 1 do 100 je $sum</p>"; 

// 6
$sum = 0;
$n = 54;
for ($i = 1; $i <= $n; $i++) {
 $sum += $i;
}
echo "<p>suma brojeva od 1 do $n je $sum</p>"; 

// 7
$m = 67;
$n = 0;
for ($i = 1; $i <= $m; $i++) {
 $n += $i;
}
echo "<p>suma brojeva od 0 do $m je $n</p>"; 

// 8

$m = 5;
$n = 1;
for ($i = 1; $i <= $m; $i++) {
 $n *= $i;
}
echo "<p>proizvod brojeva od 1 do $m je $n</p>"; 

// 9
$m = 3;
$n = 1;
for ($i = 1; $i <= $m; $i++) {
 $n += pow($i, 2);
//  bez funkcije $n = $n + $i * $i;
}
echo "<p>suma kvadrata brojeva $n</p>"; 

// 10 kasnije

$slika1 = "images/1.jpg";
$slika2 = "images/2.jpg";
$slika3 = "images/3.jpg";
$a = 0;
$b = 0;
$c = 0;
for ($i = 1; $i <= 9; $i++) {
  if ($a == $c) {
    echo "<img src='$slika1' style='width: 100px;' >";
    $a++;
  } elseif ($b < $a) {
    echo "<img src='$slika2' style='width: 100px;' >";
    $b++;
  } elseif ($c < $b) {
    echo "<img src='$slika3' style='width: 100px;' >";
    $c++;
  }
}


//11
$x = 0;
for ($i = 1; $i <= 30; $i++) {
  if ($i % 9 == 0) {
    $x += $i;
  }
}
echo "<p> $x </p>";

//12
$a = 1;
$b = 100;
for ($i = 20; $i < $b; $i++) {
  if ($i % 11 == 0) {
    $a *= $i;
   }
}
echo "<p>$a</p>";

// 13
$div = 0;
for ($i = 13; $i <= 150; $i++) {
  if ($i % 13 == 0) {
    $div++;
  }
}
echo "<p>u intervalu od 5 do 150 ima ukupno $div broja deljivih sa 13</p>";

// 14
$n = 5;
$m = 9;
$zbir = 0;
$rep = 0;
for ($i = $n; $i <= $m; $i++) {
  $zbir += $i;
  $rep++;
}
echo "<hr>";
echo $zbir / $rep;

// 15
$n = 10;
$m = -5;
$poz = 0;
$neg = 0;
for ($i = $n; $i >= $m; $i--) {
  if ($i >= 0) {
    $poz++;
  } else {
    $neg++;
  }
}
echo "<p>broj pozitivnih je $poz, a negativnih je $neg </p>";

// 16
$rez = 0;
for ($i = 5; $i <= 50; $i++) {
   if ($i % 3 == 0 || $i % 5 == 0) {
    $rez++;
   }
}
echo "<p> broj brojeva od 5 do 50 koji su deljivi sa 3 i 5 je $rez</p>";

// 17
$n = 5;
$m = 50;
$sum = 0;
for ($i = 5; $i <= 50; $i++) {
  if ($i % 10 == 4 || $i % 2 == 0) {
   $sum += $i;
  }
}
echo "<p>$sum</p>";

// 18
$a = 12;
$n = 1;
$m = 100;
for ($i = $n; $i <= $m; $i++) {
  if ($i % $a == 0) {
   echo "<p>$i</p>";
  }
}
// 19
for ($i = $n; $i <= $m; $i++) {
  if ($i % $a !== 0) {
   echo "$i, ";
  }
}
// 20
$sum = 0;
for ($i = $n; $i <= $m; $i++) {
  if ($i % $a !== 0) {
  $sum += $i;
  }
}
echo "<p>$sum</p>";
// 21
$sum = 1;
$a = 15;
$b = 6;
for ($i = $n; $i <= $m; $i++) {
  if ($i % $a == 0 && $i % $b !== 0) {
  $sum *= $i;
  }
}
echo "<p>$sum</p>";


// sahovnica
// for ($i = 1; $i <= 8; $i++) {
//   for ($y = 1; $y <= 8; $y++) {
//     if ($i % 2 == 1) {
//       if ($y % 2 == 1) {
//         echo "<div class='v-one'></div>";
//       } else {
//         echo "<div class='v-two'></div>";
//       }
//     } 
//     if ($i % 2 == 0) {
//       if ($y % 2 == 1) {
//         echo "<div class='v-two'></div>";
//       } else {
//         echo "<div class='v-one'></div>";
//       }
//     }
//   }
//   echo "<br />";
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .v-one {
      width: 100px; 
      height: 100px; 
      background-color: black;
       display:inline-block;
    }
    .v-two {
      width: 100px; 
      height: 100px; 
      background-color: white;
       display:inline-block;
    }
  </style>
</head>
<body>
</body>
</html>