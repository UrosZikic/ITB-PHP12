<?php 

function mojaFunkcija() {
  echo "Moja prva funkcija";
};
mojaFunkcija();



/**
 * @param string $parametar
 * 
 * @return [type]
 */
function mojaFunkcija2(string $parametar) {
  echo "Moja prva $parametar";
};
mojaFunkcija2("funkcija");
?>