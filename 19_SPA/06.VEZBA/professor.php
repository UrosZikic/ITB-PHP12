<?php

abstract class Professor
{
  const BASE_SALARY = 1000;
  const BACHELOR_MULTIPLIER = 1.2;
  const MASTER_MULTIPLIER = 1.5;
  const DOCTOR_MULTIPLIER = 2;
  protected $name;
  protected $subject;
  protected $experience;
  protected $academicTitle;

  // seters
  public function setName($n)
  {
    $this->name = $n;
  }
  public function setSubject($s)
  {
    $this->subject = $s;
  }
  public function setExperience($e)
  {
    $this->experience = $e;
  }
  public function setAcademicTitle($at)
  {
    $this->academicTitle = $at;
  }
  // geters
  public function getName()
  {
    return $this->name;
  }
  public function getSubject()
  {
    return $this->subject;
  }
  public function getExperience()
  {
    return $this->experience;
  }
  public function getAcademicTitle()
  {
    return $this->academicTitle;
  }
  // constructor
  public function __construct($n, $s, $e, $at)
  {
    $this->setName($n);
    $this->setSubject($s);
    $this->setExperience($e);
    $this->setAcademicTitle($at);
  }

  // method
  abstract public function professorSalary();

  public function ispis()
  {
    return "Profesor " . $this->name . " teaches " . $this->subject . ", has " . $this->experience . " years of teaching experience, and " . $this->academicTitle . "'s degree.";
  }
}

?>