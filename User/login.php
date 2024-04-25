<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilo personalizado -->
    <style>
        .container {
            margin-top: 50px;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>

<?php
include '../DB/db.php';

$message = ''; // Mensaje para el usuario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $sql->real_escape_string($_POST['username']);
    $password = $sql->real_escape_string($_POST['password']);

    // Verifica si el usuario existe y la contraseña es correcta
    $sql = "SELECT * FROM Usuarios WHERE username = '$username'";
    $result = $db->query($sql);

    if ($result->$row > 0) {
        // $user = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            $message = "Usuario correcto. ¡Bienvenido!";
            header('Location: Hamburgueseria.php');
            exit; // Asegura que el script se detenga después de la redirección
        } else {
            $message = "Contraseña incorrecta.";
        }
    } else {
        $message = "El usuario no existe.";
    }
}
?>
