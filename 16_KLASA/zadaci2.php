<?php

$ocene = [6, 7, 8, 9, 10, 10, 9, 9, 10];

function avg($parametar)
{
  $prosek = 0;
  for ($i = 0; $i < count($parametar); $i++) {
    $prosek += $parametar[$i];
  }
  return $prosek /= count($parametar);
}
echo avg($ocene);
echo "<br>";
// 3
function maxValue($parametar)
{
  $max = $parametar[0];
  for ($i = 0; $i < count($parametar); $i++) {
    if ($max < $parametar[$i]) {
      $max = $parametar[$i];
    }
  }
  return $max;
}
echo maxValue($ocene);
echo "<br>";
// 4
function maxValueTimes($parametar)
{
  $max = $parametar[0];
  $counter = 0;
  for ($i = 0; $i < count($parametar); $i++) {
    if ($max < $parametar[$i]) {
      $max = $parametar[$i];
    }
  }
  for ($i = 0; $i < count($parametar); $i++) {
    if ($parametar[$i] == $max) {
      $counter++;
    }
  }
  return $counter;
}
echo maxValueTimes($ocene);
echo "<br>";
// 5

$gradesTwo = [9, 9, 9, 10, 10, 10, 9];
function bestStudent($parametar)
{
  $gradeNine = [];
  $gradeTen = [];

  for ($i = 0; $i < count($parametar); $i++) {
    if ($parametar[$i] >= 9) {
      if ($parametar[$i] == 9) {
        array_push($gradeNine, $parametar[$i]);
      } else {
        array_push($gradeTen, $parametar[$i]);
      }
    } else {
      return false;
    }
  }
  if (count($gradeTen) > count($gradeNine)) {
    return true;

  } else {
    return false;
  }
}
echo bestStudent($gradesTwo);
echo "<br>";
// 6
function bestGradeStreak($parametar)
{
  $streak = 0;
  $temporaryStreak = 0;

  for ($i = 0; $i < count($parametar); $i++) {
    if (maxValue($parametar) == $parametar[$i]) {
      $streak++;
    } else {
      if ($temporaryStreak <= $streak) {
        $temporaryStreak = $streak;
      }
      $streak = 0;
    }
  }

  if ($streak >= $temporaryStreak) {
    return $streak;
  } else {
    return $temporaryStreak;
  }
}
echo bestGradeStreak($ocene);
// $ocene = [6, 7, 8, 9, 10, 10, 9, 9, 10];
// $gradesTwo = [9, 9, 9, 10, 10, 10, 9];
echo "<hr>";
?>



<?php
// ZADATAK 2
// 1
$gradeBook = array(
  array("ispit" => "matematika", "datum" => "2023/09/20", "ocena" => 6),
  array("ispit" => "tehnicko", "datum" => "2017/06/12", "ocena" => 9),
  array("ispit" => "engleski", "datum" => "2022/05/01", "ocena" => 7),
  array("ispit" => "hemija", "datum" => "2022/04/10", "ocena" => 9),
  array("ispit" => "statistika", "datum" => "2022/03/15", "ocena" => 9),
);
// 2
function avgTwo($parametar)
{
  $avgGrade = 0;
  for ($i = 0; $i < count($parametar); $i++) {
    $avgGrade += $parametar[$i]["ocena"];
  }
  return $avgGrade /= count($parametar);
}
echo avgTwo($gradeBook);
echo "<hr>";
// 3
function maxTwo($parametar)
{
  $max = $parametar[0]["ocena"];
  for ($i = 0; $i < count($parametar); $i++) {
    if ($max <= $parametar[$i]["ocena"]) {
      $max = $parametar[$i]["ocena"];
    }
  }
  return $max;
}
echo maxTwo($gradeBook);
echo "<hr>";
// 4
function maxValueTimesTwo($parametar)
{
  $max = $parametar[0]["ocena"];
  $counter = 0;
  for ($i = 0; $i < count($parametar); $i++) {
    if ($max <= $parametar[$i]["ocena"]) {
      $max = $parametar[$i]["ocena"];
    }
  }
  for ($i = 0; $i < count($parametar); $i++) {
    if ($parametar[$i]["ocena"] == $max) {
      $counter++;
    }
  }
  return $counter;
}
echo maxValueTimesTwo($gradeBook);
echo "<hr>";

// 5
function bestStudentTwo($parametar)
{
  $gradeNine = [];
  $gradeTen = [];

  for ($i = 0; $i < count($parametar); $i++) {
    if ($parametar[$i]["ocena"] >= 9) {
      if ($parametar[$i]["ocena"] == 9) {
        array_push($gradeNine, $parametar[$i]["ocena"]);
      } else {
        array_push($gradeTen, $parametar[$i]["ocena"]);
      }
    } else {
      return false;
    }
  }
  if (count($gradeTen) > count($gradeNine)) {
    return true;

  } else {
    return false;
  }
}
echo bestStudentTwo($gradeBook);

// 6
function bestGradeStreakTwo($parametar)
{

  $streak = 0;
  $temporaryStreak = 0;


  for ($i = 0; $i < count($parametar); $i++) {
    if (maxTwo($parametar) == $parametar[$i]["ocena"]) {
      $streak++;
    } else {
      if ($temporaryStreak <= $streak) {
        $temporaryStreak = $streak;
      }
      $streak = 0;
    }
  }

  if ($streak >= $temporaryStreak) {
    return $streak;
  } else {
    return $temporaryStreak;
  }
}
echo "<hr>";
// $gradeBook = array(
//   array("ispit" => "matematika", "datum" => "2023/9/20", "ocena" => 8),
//   array("ispit" => "fizika", "datum" => "2023/6/12", "ocena" => 9),
//   array("ispit" => "engleski", "datum" => "2022/5/1", "ocena" => 7),
//   array("ispit" => "hemija", "datum" => "2022/5/1", "ocena" => 9),
//   array("ispit" => "statistika", "datum" => "2022/3/15", "ocena" => 9),
// );

// 8

function wasExaminedIn($subject, $date)
{
  for ($i = 0; $i < count($subject); $i++) {
    if (substr($subject[$i]["datum"], 0, 4) == $date) {
      echo "<p> Student je godine " . $date . " polagao ispit: " . $subject[$i]["ispit"] . "</p>";
    }
  }
}
wasExaminedIn($gradeBook, 2022);

// 9
function avgGradeSemester($subject, $date)
{
  $avgGrade = 0;
  $counter = 0;
  for ($i = 0; $i < count($subject); $i++) {
    if (substr($subject[$i]["datum"], 0, 4) == $date) {
      $avgGrade += $subject[$i]["ocena"];
      $counter++;
    }
  }
  if ($counter == 0) {
    return "Student nije polagao ispite date godine.";
  } else {
    return $avgGrade /= $counter;
  }

}
echo avgGradeSemester($gradeBook, 2023);
echo "<br>";

// 10

//$v = "2022/03/15"
function bestSubjectScore($subject)
{
  $ispit = "";
  $examDate = 0;
  $maxGrade = maxTwo($subject);
  for ($i = 0; $i < count($subject); $i++) {

    if ($maxGrade == $subject[$i]["ocena"]) {

      $curDate = strtotime($subject[$i]["datum"]);

      if ($examDate == 0 || $examDate >= $curDate) {

        $examDate = strtotime($subject[$i]["datum"]);

        $ispit = $subject[$i]["ispit"];

      }
    }
  }
  return $ispit;
}
echo bestSubjectScore($gradeBook);
echo "<br>";

// 11
function checkExam($subject, $name, $min, $max)
{
  $examsPassed = 0;
  for ($i = 0; $i < count($subject); $i++) {
    if (str_contains($subject[$i]["ispit"], $name) && $subject[$i]["ocena"] >= $min && $subject[$i]["ocena"] <= $max) {
      $examsPassed++;
    }
  }
  return $examsPassed;
}
echo checkExam($gradeBook, "tehnicko", 7, 10);



?>