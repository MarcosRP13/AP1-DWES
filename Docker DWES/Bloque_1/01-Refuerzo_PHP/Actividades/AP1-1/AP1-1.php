<?php

$info = [];

foreach ($_GET as $clave => $valor) {
    $info[$clave] = $valor;
};

foreach ($info as $clave => $valor) {
    echo "Se ha recibido $valor para la clave $clave.<br>";
};

?>