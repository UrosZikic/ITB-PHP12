<?php
require_once "professor.php";


class Master extends Professor
{

  public function __construct($n, $s, $e)
  {
    parent::__construct($n, $s, $e, "Master");
  }
  public function professorSalary()
  {

    return parent::BASE_SALARY * parent::MASTER_MULTIPLIER + ($this->experience * 100);
  }
}

?>