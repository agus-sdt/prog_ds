<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'];
    $unidad = $_POST['unidad'];

    require_once 'Conversor.php';  
    $conversor = new Conversor($valor, $unidad);
    $resultados = $conversor->convertir();

    session_start();
    $_SESSION['resultados'] = $resultados;

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

session_start();
$resultados = isset($_SESSION['resultados']) ? $_SESSION['resultados'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades</title>
</head>
<body>
    <h1>Conversor de Unidades</h1>
    <form action="" method="POST">
        <label for="valor">Ingresa un valor:</label>
        <input type="number" name="valor" id="valor" step="any" required>
        
        <label for="unidad">Selecciona la unidad:</label>
        <select name="unidad" id="unidad" required>
            <option value="km">Kilómetros (km)</option>
            <option value="hm">Hectómetros (hm)</option>
            <option value="dam">Decámetros (dam)</option>
            <option value="m">Metros (m)</option>
            <option value="dm">Decímetros (dm)</option>
            <option value="cm">Centímetros (cm)</option>
            <option value="mm">Milímetros (mm)</option>
        </select>

        <button type="submit">Convertir</button>
    </form>

    <?php

    if ($resultados) {
        echo "<h2>Resultados:</h2>";
        echo "<ul>";

        foreach ($resultados as $unidad => $resultado) {
            echo "<li>{$resultado} {$unidad}</li>";
        }

        echo "</ul>";
        echo '<form action="" method="GET">';
        echo '<button type="submit">Reiniciar</button>';
        echo '</form>';

        unset($_SESSION['resultados']);
    }
    ?>

</body>
</html>
