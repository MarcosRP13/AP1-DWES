<?php

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $host = "mariadb-server";
    $user = "root";
    $pass = "root";
    $db = "AP1";

    try {
        $mysqli = new mysqli ($host,$user,$pass,$db);
        echo "Conexion con exito". "<br>";
    }
    catch (mysqli_sql_exception $e) {
        die ($e->getMessage());
    }

    try {
        $sql = "SELECT * FROM usuarios";
        $resultado = $mysqli->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
            echo "ID: " . $fila["id"] . "<br>";
            echo "Nombre: " . $fila["nombre"] . "<br>";
            echo "Estado: " . $fila["estado"] . "<br>";
        }
    }
    catch (mysqli_sql_exception $e) {
        die ($e->getMessage());
    }

    $nombre = "Sergio";
    $estado = "0";

    try {
        $sql = "INSERT INTO usuarios (nombre, estado) VALUES ('$nombre', '$estado')";
        $resultado = $mysqli->query($sql);
    }
    catch (mysqli_sql_exception $e) {
        die ($e->getMessage());
    }

    $id = 3 ;
    $estado1 = "1";

    try {
        $sql = "UPDATE usuarios SET estado = '$estado1' WHERE id = '$id'";
        $resultado = $mysqli->query($sql);
    }
    catch (mysqli_sql_exception $e) {
        die ($e->getMessage());
    }

    $id = 8;

    try {
        $sql = "DELETE FROM usuarios WHERE id = $id";
        $resultado = $mysqli->query($sql);
    }
    catch (mysqli_sql_exception $e) {
        die ($e->getMessage());
    }

    $mysqli->close();

    