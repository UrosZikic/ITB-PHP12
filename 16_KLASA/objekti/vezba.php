<?php
// include film.php -> ako ne postoji onda ignorise.
//include_once
// require film.php -> ako ne postoji onda vraca gresku.
// require once film.php


require_once "film.php";
require "nemiFilm.php";

$f1 = new Film("Lord of The Rings", "Peter Jackson", 2001, [7, 5.8, 8.7, 10]);

$f2 = new Film("Kill Bill", "Quentin Tarantino", 2003, [10, 9.5, 9.8, 7.5]);

$f3 = new Film("Titanik", "James Cameron", 1999, [7.6, 5.5]);

$filmovi = [
  $f1,
  $f2,
  $f3
];

foreach ($filmovi as $film) {
  $film->stampaj();
}

function prosecnaOcena($filmovi)
{
  $zbir = 0;
  foreach ($filmovi as $film) {
    $zbir += $film->prosek();
  }
  $n = count($filmovi);
  return $n > 0 ? $zbir / $n : 0;
}
$prosecna = prosecnaOcena($filmovi);
echo "<p>Prosecna ocena svih filmova jednaka je: $prosecna";

function vekFilmova($films, $vek)
{
  foreach ($films as $film) {
    $godinaIzdanja = $film->getGodIzdanja();
    $vekIzdanja = ceil($godinaIzdanja / 100);
    if ($vekIzdanja == $vek) {
      $film->stampaj();
    }
  }
}
echo "<p> Filmovi koji su izasli u 21 veku su: ";
vekFilmova($filmovi, 21);



function osrednjiFilm($niz)
{
  $prosek = prosecnaOcena($niz);
  $najblizaVrednost = abs($niz[0]->prosek() - $prosek);
  $najbliziFilm = $niz[0];
  foreach ($niz as $film) {
    $vrednost = abs($film->prosek() - $prosek);
    if ($vrednost < $najblizaVrednost) {
      $najblizaVrednost = $vrednost;
      $najbliziFilm = $film;
    }
  }
  return $najbliziFilm;
}

$osf = osrednjiFilm($filmovi);
echo "<p> Film najblizi prosecnoj vrednosti je: </p>";
$osf->stampaj();
echo "<hr>";

function najboljeOcenjeni($filmovi)
{
  $najboljeOcenjenFilm = "";
  $najvisaOcena = 0;
  foreach ($filmovi as $film) {
    $vrednost = $film->prosek();
    if ($najvisaOcena < $vrednost) {
      $najvisaOcena = $vrednost;
      $najboljeOcenjenFilm = $film;
    }
  }
  return $najboljeOcenjenFilm;
}
$test = najboljeOcenjeni($filmovi);
echo "<p> Film sa najvecom ocenom je: ";
$test->stampaj();
echo "<hr>";

function najmanjaOcenaNajboljeg($niz)
{
  $najboljiFilm = najboljeOcenjeni($niz);
  $sveOcene = $najboljiFilm->getOcene();
  $minOcena = $sveOcene[0];
  foreach ($sveOcene as $ocena) {
    $minOcena = $ocena < $minOcena ? $ocena : $minOcena;
  }
  return $minOcena;
}
$minOcena = najmanjaOcenaNajboljeg($filmovi);
echo "<p>Najmanja ocena najbolje ocenjenog filma je: $minOcena </p>";
echo "<hr>";

function najmanjaOcena($niz)
{
  $ocenePrvogFilma = $niz[0]->getOcene();
  $minOcena = $ocenePrvogFilma[0];
  foreach ($niz as $film) {
    $ocene = $film->getOcene();
    foreach ($ocene as $o) {
      if ($o < $minOcena) {
        $minOcena = $o;
      }
    }
  }
  return $minOcena;
}
$mo = najmanjaOcena($filmovi);
echo "<p>Najmanja ocena bilo kojeg filma je: $mo </p>";
echo "<hr>";



?>