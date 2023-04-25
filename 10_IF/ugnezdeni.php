<?php 
$pol = 'z';
$godine = 24;

if ($pol == 'm') {
  if ($godine >= 18) {
    echo "<p>Musko, punoletno</p>";
  } else {
    echo "<p>Musko, maloletno</p>";
  }
} else {
  if ($godine >= 18) {
    echo "<p>Zensko, punoletno</p>";
  } else {
    echo "<p>Zensko, maloletno</p>";
  }
}

if($pol == 'm' && $godine >= 18) {
  echo "<p>Musko, punoletno</p>";
}

$sati = date('H');
if ($sati < 9 || $sati >= 17) {
  echo "<p>firma ne radi</p>";
} else {
  echo "<p>firma radi</p>";
}
?>