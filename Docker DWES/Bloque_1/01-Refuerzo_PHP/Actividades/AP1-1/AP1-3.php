<?php

$pos = [
    1 => "primero",
    3 => "segundo",
    5 => "tercero",
    7 => "cuarto",
    9 => "quinto",
    11 => "sexto",
];

foreach ($pos as $clave => $valor) {
    if  ($valor == "primero" || $valor == "tercero" || $valor == "quinto"   ) {
        echo "Estas en una posicion impar". "<br>";
        $impar = true;
        $par = false;
    }
    elseif ($valor == "segundo" || $valor == "cuarto" || $valor == "sexto") {
        echo "Estas en una posicion par". "<br>";
        $par = true;
        $impar = false;
    }

}