<?php
session_start();
include 'db.php'; 

// Verifica si se recibió el token
if (!isset($_GET['token'])) {
    header("Location: index.php");
    exit;
}

$token = $_GET['token'];

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir la nueva contraseña y la confirmación
    $nueva_contraseña = $_POST['nueva_contraseña'];
    $confirmar_contraseña = $_POST['confirmar_contraseña'];

    // Verificar si las contraseñas coinciden
    if ($nueva_contraseña !== $confirmar_contraseña) {
        // Si no coinciden, mostrar un mensaje de error
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las contraseñas no coinciden.',
                }).then(function() {
                    window.history.back();
                });
              </script>";
        exit;
    }

    // Actualizar la contraseña en la base de datos
    try {
        // Verifica si el token es válido
        $stmtCheck = $conn->prepare("SELECT email FROM password_reset WHERE token = :token");
        $stmtCheck->bindParam(':token', $token);
        $stmtCheck->execute();
        
        // Si no se encuentra el token, mostrar un mensaje
        if ($stmtCheck->rowCount() === 0) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El token no es válido o ha expirado.',
                    }).then(function() {
                        window.location.href = 'index.php';
                    });
                  </script>";
            exit;
        }
        
        // Obtener el email del token
        $row = $stmtCheck->fetch(PDO::FETCH_ASSOC);
        $email = $row['email'];

        // Hashear la nueva contraseña
        $hashed_password = password_hash($nueva_contraseña, PASSWORD_DEFAULT);

        // Actualiza la contraseña en la tabla usuarios
        $stmtUpdate = $conn->prepare("UPDATE usuarios SET contraseña = :contraseña WHERE email = :email");
        $stmtUpdate->bindParam(':contraseña', $hashed_password);
        $stmtUpdate->bindParam(':email', $email);
        $stmtUpdate->execute();

        if ($stmtUpdate->rowCount() > 0) {
            // Elimina el token usado de la tabla password_reset
            $stmtDeleteToken = $conn->prepare("DELETE FROM password_reset WHERE token = :token");
            $stmtDeleteToken->bindParam(':token', $token);
            $stmtDeleteToken->execute();

            // Si la actualización es exitosa, mostrar mensaje de éxito
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'La contraseña fue actualizada con éxito.',
                    }).then(function() {
                        setTimeout(function() {
                            window.location.href = 'index.php';
                        }, 5000);
                    });
                  </script>";
        } else {
            // Si no se pudo actualizar la contraseña
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo actualizar la contraseña. Por favor, inténtalo de nuevo.',
                    }).then(function() {
                        window.history.back();
                    });
                  </script>";
        }
    } catch (PDOException $e) {
        // Si hay un error en la actualización
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al actualizar la contraseña: " . addslashes($e->getMessage()) . "',
                }).then(function() {
                    window.history.back();
                });
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="estilos.css"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>
    <div class="login-container">
        <div class="login-img"></div>
        <div class="login-form">
            <h1>Cambiar Contraseña</h1>
            <form method="post">
                <label for="nueva_contraseña">Nueva Contraseña:</label>
                <input type="password" name="nueva_contraseña" required>
                
                <label for="confirmar_contraseña">Confirmar Contraseña:</label>
                <input type="password" name="confirmar_contraseña" required>
                
                <button type="submit">Actualizar Contraseña</button>
            </form>
        </div>
    </div>
</body>
</html>
