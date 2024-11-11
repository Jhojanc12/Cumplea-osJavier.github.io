<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Regalo 5 - Cupones</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Vincula tu archivo de estilos -->
</head>
<body>
    <div class="form-container">
        <h2>Elige tu cupón de cumpleaños 🎁</h2>
        <form action="procesar_formulario.php" method="post">
            <div class="input-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>

            <div class="input-group">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" required>
            </div>
            
            <div class="input-group">
                <label for="actividad">Actividad:</label>
                <select id="actividad" name="actividad" required>
                    <option value="Helado">Ida a comer helado</option>
                    <option value="Pelis">Tarde de Pelis</option>
                </select>
            </div>
            
            <div class="input-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <button type="submit" class="submit-btn">Registrar</button>
            <!-- Botón de Inicio -->
        <a href="index.php" class="inicio-btn">Inicio</a>
        </form>

        
    </div>
</body>
</html>
