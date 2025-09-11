<?php

$info = [];

foreach ($_GET as $clave => $valor) {
    $info[$clave] = $valor;
}

foreach ($_GET as $clave => $valor) {
    if ($valor === "" || $valor === null) {
        echo "[$clave]: No se ha recibido ningún valor o es un valor vacío" . "<br>";
            }
        elseif (is_numeric($valor)) {
            echo "[$clave]: El valor es un numero" . "<br>";
        }
            else {
                echo "[$clave]: El valor es una cadena de caracteres". "<br>";
    }
}


