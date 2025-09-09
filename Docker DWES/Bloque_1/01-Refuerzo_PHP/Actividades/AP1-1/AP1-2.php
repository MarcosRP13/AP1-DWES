<?php

$info = [];

foreach ($_GET as $clave => $valor) {
    $info[$clave] = $valor;
}

foreach ($_GET as $clave => $valor) {
    if ($valor === "" || $valor === null) {
        echo "No se ha recibido ningún valor o es un valor vacío" . "<br>";
            }
        elseif ($valor >= 0) {
            echo "El valor es un numero" . "<br>";
        }
            else {
                echo "El valor es una cadena de caracteres". "<br>";
    }
}


