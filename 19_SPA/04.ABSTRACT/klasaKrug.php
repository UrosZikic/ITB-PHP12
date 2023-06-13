<?php
// const PI = 3.14;
//ClassName(krug)::PI || self::PI -> if inside the class.
// public static $pi = 3.14;
//className(Krug)::$pi || self::$pi;
class Krug
{

  protected $r;
  const PI = 3.14;
  private static $pi = self::PI;

  private static $brojKrugova = 0;
  // konstruktor
  public function __construct($r)
  {
    self::$brojKrugova++;
    $this->r = $r;
  }
  // seter
  public function setKrug($r)
  {
    $this->r = $r;
  }

  // geter
  public static function getBrojKrugova()
  {
    return self::$brojKrugova;
  }
  public function getKrug()
  {
    return $this->r;
  }

  public function obimKruga()
  {
    $obim = 2 * $this->r * self::PI;
    return $obim;
  }
  public function povrsinaKruga()
  {
    $povrsina = pow($this->r, 2) * Krug::PI;
    return $povrsina;
  }


}


?>