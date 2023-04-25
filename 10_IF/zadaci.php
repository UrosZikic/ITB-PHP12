<?php 
// 1.
$a = 19.35;
$b = -3.14;

if ($a > $b) {
  echo "<p>Veci je broj $a </p>";
} else {
  echo "<p>Veci je broj $b</p>";
}
// 4.
$dobaDana = date("a");
if ($dobaDana == "am") {
  echo "<p>pre podne</p>";
} else {
  echo "<p> posle podne </p>";
}

//3
$pol = "M";
if ($pol == "M") {
  echo "<p> 
  <img src='images/m.png' alt='muski pol'>
  </p>";
}  else {
  echo "<p> 
  <img src='images/f.png' alt='zenski pol'>
  </p>";
}
// 2
$temp = 10;
if ($temp >= 0) {
  echo "<p> Temperatura je u plusu </p>";
} else  {
  echo "<p> Temperatura je u minusu </p>";
} 

//5
$godSad = date('Y');
$godRod = 1998;
if ($godSad - $godRod >= 18) {
  echo "<p> Osoba je punoletna </p>";
} else {
  echo "<p> Osoba je maloletna </p>";
}

//6 
$a = 3;
$b = 1;
$c = 2;
if ($a > $b) {
  $pom = $a;
  $a = $b;
  $b = $pom;

}
if ($a > $c) {
  $pom = $a;
  $a = $c;
  $c = $a;

}
if ($b > $c) {
  $pom = $b;
  $b = $c;
  $c = $pom;

}
echo "<p> $a <= $b <= $c </p>";


// 7
$rezultat = 92;
if ($rezultat < 51) {
  echo "<p>Student je pao test</p>";
} elseif ($rezultat <= 60) {
  echo "<p>Student je dobio ocenu 6</p>";
} elseif ($rezultat <= 70) {
  echo "<p>Student je dobio ocenu 7</p>";
} elseif ($rezultat <= 80) {
  echo "<p>Student je dobio ocenu 8</p>";
} elseif ($rezultat <= 90) {
  echo "<p>Student je dobio ocenu 9</p>";
} elseif ($rezultat >= 91) {
  echo "<p>Student je dobio ocenu 10</p>";
}

// 8
$currentDay = date('D');
if ($currentDay !== 'Sat' && $currentDay !== 'Sun') {
    echo "<p>Danas je radni dan</p>"; 
} else {
  echo "<p>Danas je vikend</p>";
}

// 9
$timeNow = date('H');
if ($timeNow < 12) {
  echo "<p>Dobro jutro</p>";  
} elseif ($timeNow < 18) {
  echo "<p>Dobar dan</p>";  
} else {
  echo "<p>Dobro vece</p>";
}

// 10
$d_1 = 5;
$m_1 = 4;
$y_1 = 2023;

$d_2 = 20;
$m_2 = 5;
$y_2 = 2023;

if ($y_1 < $y_2) {
  echo "<p>datum _1 je raniji</p>";
} elseif ($y_2 < $y_1) {
  echo "<p>datum _2 je raniji</p>";
} else {
  if ($m_1 < $m_2) {
    echo "<p>datum _1 je raniji</p>";
  } elseif ($m_2 < $m_1) {
    echo "<p>datum _2 je raniji</p>";
  } else {
    if ($d_1 < $d_2) {
      echo "<p>datum _1 je raniji</p>";
    } else {
      echo "<p>datum _2 je raniji</p>";
    }
  }
} 


// 11
// $timeNow = date('H');
$minuteNow = date('i');

if ($timeNow >= 9 && $minuteNow >= 0 && $timeNow < 16 && $minuteNow <= 59) {
  echo "<p>Firma radi</p>";
} else {
  echo "<p>Firma ne radi</p>";
}


// 12
$p1 = 9;
$k1 = 17;

$p2 = 11;
$k2 = 18;

if ($k1 < $p2) {
  echo "<p>ne reklapaju se</p>";
} elseif ($k2 < $p1) {
  echo "<p> ne Preklapaju se</p>";
} else {
  echo "<p>preklapaju se</p>";
}


// 13

$n = 13;
if ($n % 2 == 0) {
  echo "<p>deljiv</p>";
} else {
  echo "<p>nedeljiv</p>";
}

// 14
if ($n % 3 == 0) {
  echo "<p>deljiv</p>";
} else {
  echo "<p>nedeljiv</p>";
}

// 15
$prvi = 5;
$drugi = 4;
if ($prvi > $drugi) {
  echo $prvi - $drugi;
} else {
  echo $drugi - $prvi;
}


echo "<br />";


// 16
$n = 2;
if ($n <= 0) {
 echo  $n -= 1;
} else {
  echo $n += 1;
}
// 17
$a = 5;
$b = 10;
$c = -5;
if ($a < $b) {
  if ($a < $c) {
    if ($b < $c) {
      echo "<p>$a, $b, $c</p>";
    } else {
      echo "<p>$a, $c, $b</p>";
    }
  } else {
    echo "<p>$c, $a, $b</p>";
  }
} 
// a > b
elseif($b < $c) {
  if ($a < $c) {
    echo "<p>$b, $a, $c</p>";
  } else {
    echo "<p>$b, $c, $a</p>";
  }
} else {
  echo "<p>$c, $b, $a</p>";
}


// 18
$n = 10.4;
if ($n == round($n)) {
  echo "<p>$n je ceo broj</p>";
} else {
  echo "<p>$n nije ceo broj</p>";
}

// 19
$a = -11;
$b = -4;
$c = -20;

if ($a < $b) {
  if ($a < $c) {
    if ($b < $c) {
      echo "<p>$a, $b, $c</p>";
    } else {
      echo "<p>$a, $c, $b</p>";
    }
  } else {
    echo "<p>$c, $a, $b</p>";
  }
} elseif ($b < $c) {
  if ($a < $c) {
    echo "<p>$b, $a, $c</p>";
  } else {
    echo "<p>$b, $c, $a</p>";
  }
} else {
  echo "<p>$c, $a, $b</p>";
}

// 20
$a = 5;
$b = 6;
if ($a > $b) {
  if ($a % 2 == 0) {
    echo $a . " je paran";
  } else {
    echo "broj je neparan";
  }
} else {
  if ($b % 2 == 0) {
    echo $b . " je paran";
  } else {
    echo "broj je neparan";
  }
}

// 24
$p1 = 8;
$k1 = 22;

$p2 = 7;
$k2 = 10;

if ($k1 > $p2 && $p2 > $p1) {
 echo "<p> smene se preklapaju " . ($k1 - $p2) . " sati </p>";
} elseif ($k2 > $p1 && $p1 > $p2) {
  echo "<p> smene se preklapaju " . ($k2 - $p1) . " sati </p>";
} else {
  echo "<p>smene se ne preklapaju. </p>";
}



?>


