    <?php

    $host = "mariadb-server";
    $user = "root";
    $pass = "root";
    $db = "AP1";

    $mysqli = new mysqli ($host,$user,$pass,$db);

    if ($mysqli->connect_error) {
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

    $nombre = "Aladin";
    $estado = "0    ";

    $sql = "INSERT INTO usuarios (nombre, estado) VALUES ('$nombre', '$estado')";

    if (mysqli_query($mysqli, $sql)) {
        echo "Se ha registrado correctamente el usuario";
    }
    else {
        echo "Error al registrar: " . mysqli_error($mysqli);
    }

    $id = 115;
    $estado1 = "1";

    $sql = "UPDATE usuarios SET estado = '$estado1' WHERE id = '$id'";


    if ($mysqli->query($sql) === TRUE) {
        echo "Usuario actualizado con exito";
    }
    else {
        echo "Error al actualizar: " . $mysqli->error;
    }

    $id = 5;

    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($mysqli->query($sql) === TRUE) {
        echo "Usuario eliminado con exito";
    }
    else {
        echo "Error al eliminar usuario: " . $mysqli->error;
    }

    