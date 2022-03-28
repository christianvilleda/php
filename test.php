<?php

echo "holi mundo! <br>";

$nombre = "Pepito ";

$apellido = "Grillo";


echo "No, no. Yo me llamo " . $nombre . $apellido.  "<br>";

echo "El resultado de  4 x 5 es " . (4 * 5) . "<br>";

$personas = [
    "carlos" => 22,
    "Christian" => 21,
    "Juan" => 65
];

var_dump( $personas );

echo "<br>";

print_r( $personas );
echo "<br>"; echo "\n";

// variales
$numero_1 = 8;
$numero_2 = 7;

echo $numero_1 + $numero_2." variable <br>";

//constantes
define("NUMERO_E", 2.7183);
echo NUMERO_E." CONSTANTE <br>";
?>