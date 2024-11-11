<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$conn = new mysqli('localhost', 'root', '', 'cumpleanos');

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha = $_POST['fecha'];
    $actividad = $_POST['actividad'];
    $hora = $_POST['hora'];
    $email = $_POST['email'];
    
    // Preparar la consulta SQL para insertar los datos
    $stmt = $conn->prepare("INSERT INTO cupones (fecha, actividad, hora, email) VALUES (?, ?, ?, ?)");
    
    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $conn->error);
    }

    // Asociar los parámetros con la consulta SQL
    $stmt->bind_param("ssss", $fecha, $actividad, $hora, $email);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Configuración de PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'javiercumpleanos24@gmail.com';  // Reemplaza con tu correo
            $mail->Password = 'lctn whna lybn noxp';        // Reemplaza con tu contraseña
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Establecer la codificación de caracteres
            $mail->CharSet = 'UTF-8'; // Agrega esta línea para codificación UTF-8

            // Configurar el correo
            $mail->setFrom('tu_correo@gmail.com', 'Admin Cumpleaños Javier');
            $mail->addAddress($email); // Correo del usuario
            $mail->addBCC('jhojanc1209@gmail.com'); // Copia oculta
            $mail->isHTML(true);
            $mail->Subject = 'Confirmación de cupón de cumpleaños';
            
            // Estilo HTML para el cuerpo del correo
            $mail->Body = "
            <html>
                 <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f0f0f0;
                            color: #333;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            background-color: #ffffff;
                            padding: 20px;
                            max-width: 600px;
                            margin: auto;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        h1 {
                            color: #4CAF50;
                            text-align: center;
                        }
                        p {
                            font-size: 16px;
                            line-height: 1.5;
                        }
                        .button {
                            background-color: #4CAF50;
                            color: white;
                            padding: 10px 20px;
                            text-align: center;
                            display: inline-block;
                            border-radius: 5px;
                            text-decoration: none;
                        }
                        .footer {
                            font-size: 12px;
                            text-align: center;
                            margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1>¡Tu cupón de cumpleaños ha sido confirmado!</h1>
                        <p>Has registrado con éxito el cupón para la actividad <strong>$actividad</strong>.</p>
                        <p>Fecha de la actividad: <strong>$fecha</strong></p>
                        <p>Hora de la reserva: <strong>$hora</strong></p>
                        <p>¡Te esperamos para celebrar tu cumpleaños!</p>
                        <p class='footer'>Si no realizaste esta solicitud, por favor ignora este mensaje.</p>
                    </div>
                </body>
            </html>";

            $mail->send();
            
            // Si el correo se envió exitosamente, mostrar mensaje de confirmación y botón de inicio
            echo "
            <html>
                <head>
                    <link rel='stylesheet' type='text/css' href='styles.css'>
                </head>
                <body>
                    <div class='confirmation-container'>
                        <h1>¡Tu registro ha sido exitoso!</h1>
                        <p>Se ha enviado una confirmación a tu correo.</p>
                        <a href='index.php' class='button'>Volver al inicio</a>
                    </div>
                </body>
            </html>";
        } catch (Exception $e) {
            echo "Error al enviar correo: {$mail->ErrorInfo}";
        }
    } else {
        // Mostrar el error si la ejecución falla
        echo 'Error al guardar los datos en la base de datos: ' . $stmt->error;
    }
    
    // Cerrar la sentencia
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
