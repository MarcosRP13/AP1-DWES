<?php

$pos = [
    1 => "primero",
    3 => "segundo",
    5 => "tercero",
    7 => "cuarto",
    9 => "quinto",
    11 => "sexto",
];

$suma = 0;
$contador = 1;
foreach ($pos as $clave => $valor) {
    if  ($contador == 1 || $contador == 3 || $contador == 5) {
        echo "Estas en una posicion impar". "<br>";
        $impar = true;
        $par = false;
        $suma = $suma + $clave;
        echo "$suma". "<br>";
    }
    elseif ($contador == 2 || $contador == 4 || $contador == 6) {
        echo "Estas en una posicion par". "<br>";
        $par = true;
        $impar = false;
        $suma = $suma + $clave;
        echo "$suma". "<br>";
    }
    if ($suma > 5) {
        echo "El valor de la suma es mayor que 5" . "<br>";
    }
    elseif ($suma > 10) {
        echo "El valor de la suma es mayor que 10" . "<br>";
    }
    elseif ($suma > 20) {
        echo "El valor de la suma es mayor que 20" . "<br>";
    }
    $contador++;
}