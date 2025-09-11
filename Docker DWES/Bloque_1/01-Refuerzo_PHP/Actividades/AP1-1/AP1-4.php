<?php
function calcularAreaTriangulo($base, $altura) {
    return ($base * $altura) / 2;
}

function calcularAreaRectangulo($base, $altura) {
    return $base * $altura;
}

function calcularAreaCirculo($radio) {
    return pi() * $radio * $radio;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de Áreas</title>
</head>
<body>
<h1>Calculadora de Áreas</h1>

<form method="post">
    <label for="figura">Elige una figura:</label>
    <select name="figura" id="figura" required>
        <option value="triangulo">Triángulo</option>
        <option value="rectangulo">Rectángulo</option>
        <option value="circulo">Círculo</option>
    </select>
    <br><br>

    <label>Base: <input type="number" name="base" step="any"></label><br>
    <label>Altura: <input type="number" name="altura" step="any"></label><br>
    <label>Radio: <input type="number" name="radio" step="any"></label><br><br>

    <input type="submit" value="Calcular Área">
</form>

<hr>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $figura = $_POST["figura"];

    if ($figura == "triangulo") {
        $base = $_POST["base"];
        $altura = $_POST["altura"];
        if ($base !== "" && $altura !== "") {
            $area = calcularAreaTriangulo($base, $altura);
            echo "El área del triángulo es: " . $area;
        } else {
            echo "Debes ingresar base y altura para el triángulo.";
        }
    } elseif ($figura == "rectangulo") {
        $base = $_POST["base"];
        $altura = $_POST["altura"];
        if ($base !== "" && $altura !== "") {
            $area = calcularAreaRectangulo($base, $altura);
            echo "El área del rectángulo es: " . $area;
        } else {
            echo "Debes ingresar base y altura para el rectángulo.";
        }
    } elseif ($figura == "circulo") {
        $radio = $_POST["radio"];
        if ($radio !== "") {
            $area = calcularAreaCirculo($radio);
            echo "El área del círculo es: " . $area;
        } else {
            echo "Debes ingresar el radio para el círculo.";
        }
    }
}
?>
</body>
</html>

