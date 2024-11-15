<?php
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cumpleaños</title>
    <!-- Vincular el archivo de estilos -->
    <link rel="stylesheet" href="styles.css">
    <!-- Vincular el archivo de animación JS -->
    <script src="animacion.js" defer></script>
</head>
<body>
    <header>
        <h1>¡Bienvenido a tu página de cumpleaños! 🎉</h1>
    </header>

    <!-- Botones de selección -->
    <section class="buttons-container">
        <button onclick="window.location.href='regalo5.php'">Regalo 5</button>
        <button id="regalo6" onclick="mostrarAnimacion()">Regalo 6</button>
    </section>

    <!-- Contenedor de animación -->
    <div id="animacion"></div>

</body>
</html>
