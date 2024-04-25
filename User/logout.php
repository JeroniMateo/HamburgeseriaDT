<?php
session_start();
session_unset();   // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión
header("Location: login.php"); // Redirigir al usuario a la página de login
exit();
?>
