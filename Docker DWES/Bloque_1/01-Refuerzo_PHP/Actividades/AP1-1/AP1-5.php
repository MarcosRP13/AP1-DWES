<?php

$host = "mariadb-server";
$user = "root";
$pass = "root";
$db = "AP1";

$mysqli = new mysqli ($host,$user,$pass,$db);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
}

// echo "Conectado a la base de datos";

$sql = "SELECT * FROM usuarios";
$resultado = $mysqli->query($sql);
while ($fila = $resultado->fetch_assoc()) {
    echo "ID: " . $fila["id"] . "<br>";
    echo "Nombre: " . $fila["nombre"] . "<br>";
    echo "Estado: " . $fila["estado"] . "<br>";
}

