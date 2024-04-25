<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Registro de Usuario</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>
</body>
</html>

<?php
include '../DB/db.php';

$message = ''; // Mensaje para el usuario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $sql->real_escape_string($_POST['username']);
    $email = $sql->real_escape_string($_POST['email']);
    $password = $sql->real_escape_string($_POST['password']);
    $confirm_password = $sql->real_escape_string($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $message = "Las contraseñas no coinciden.";
    } else {
        // Verifica si el usuario ya existe
        $sql = "SELECT * FROM Usuarios WHERE username = '$username'";
        $result = $db->query($sql);

        if ($resultados) {
            $message = "El usuario ya existe.";
        } else {
            // Inserta el nuevo usuario
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insertSql = "INSERT INTO Usuarios (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if ($db->query($insertSql) === TRUE) {
                $message = "Usuario registrado con éxito.";
                header('Location: Hamburgueseria.php');
            exit; // Asegura que el script se detenga después de la redirección
            } else {
                $message = "Error: ";
            }
        }
    }
}
?>

