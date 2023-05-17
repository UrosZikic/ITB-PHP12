<?php 
// bez array
// $car1 = "BMW";
// $car2 = "Volvo";
// $car3 = "Toyota";

// sa array
$cars = array("BMW", "Volvo", "Toyota");
// var_dump shows index => type(length) => value
// var_dump($cars[1]);

//print_r
// print_r($cars);

// $prviElement = $cars[0];
// $drugiElement = $cars[1];
// $treciElement = $cars[2];

$polaznici = array();
$polaznici[] = "Aleksandar";
$polaznici[] = "Uros";
$polaznici[] = "Milijana";
$polaznici[] = "Andreja";

for ($i = 0; $i < count($polaznici); $i++) {
  echo "<p>$polaznici[$i]</p>";
}

$str = "<p>Hello World<p>";
echo $str;


// asoc array
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

?>