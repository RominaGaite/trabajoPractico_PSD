<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirige al inicio de sesión si no está autenticado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <div class="contenido-bienvenida">
            <h2 class="aparecer-suave">Bienvenido/a</h2>
            <p class="aparecer-suave">Si llegaste a esta pantalla es porque ingresaste correctamente al sistema y tienes un perfil de usuario.</p>
        </div>
    </div>
</body>
</html>
