<?php
require_once "professor.php";


class Bachelor extends Professor
{

  public function __construct($n, $s, $e)
  {
    parent::__construct($n, $s, $e, "Bachelor");
  }
  public function professorSalary()
  {

    return parent::BASE_SALARY * parent::BACHELOR_MULTIPLIER + ($this->experience * 100);
  }
}

?>