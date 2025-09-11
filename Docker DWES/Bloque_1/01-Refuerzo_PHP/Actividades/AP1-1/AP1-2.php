<?php

$info = [];

foreach ($_GET as $clave => $valor) {
    $info[$clave] = $valor;
}

foreach ($_GET as $clave => $valor) {
    if ($valor === "" || $valor === null) {
        echo "[$clave -> $valor]: No se ha recibido ningún valor o es un valor vacío" . "<br>";
            }
        elseif (is_numeric($valor)) {
            echo "[$clave -> $valor]: El valor es un numero" . "<br>";
        }
            else {
                echo "[$clave -> $valor]: El valor es una cadena de caracteres". "<br>";
    }
}


