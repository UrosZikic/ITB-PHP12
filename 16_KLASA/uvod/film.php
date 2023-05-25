<?php
class Film
{
  var $naslov;
  var $reziser;
  var $godinaIzdanja;

  function stampaj()
  {
    echo "<p> Naslov filma je, " . $this->naslov . " ime rezisera je " . $this->reziser . ", film je izasao godine" . $this->godinaIzdanja . "</p>";
  }
}
$a = new Film();
$b = new Film();
$c = new Film();

$a->naslov = "Star Wars";
$b->naslov = "Shrek";
$c->naslov = "Spider-Man";

$a->reziser = "Lucas";
$b->reziser = "Vicky Jenson";
$c->reziser = "Sam Reimi";

$a->godinaIzdanja = 1971;
$b->godinaIzdanja = 2001;
$c->godinaIzdanja = 2000;

$c->stampaj();

?>