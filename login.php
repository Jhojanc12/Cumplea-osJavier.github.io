<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'cumpleanos');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cedula = $_POST['cedula'];
    $clave = $_POST['clave'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE cedula = ? AND clave = ?");
    $stmt->bind_param("ss", $cedula, $clave);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['authenticated'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Cédula o clave incorrecta.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login de Cumpleaños</title>
</head>
<body>
    <form method="post" action="">
        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" required>
        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required>
        <button type="submit">Iniciar Sesión</button>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </form>
</body>
</html>
