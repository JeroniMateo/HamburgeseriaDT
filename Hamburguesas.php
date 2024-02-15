<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Hamburguesas</title>
</head>
<body>

<?php

// Conexión a la base de datos
$db = new PDO('mysql:host=localhost;dbname=hamburgueseria', 'root', '');

// Consulta para obtener las hamburguesas
$query = 'SELECT * FROM hamburguesas';

// Ejecución de la consulta
$stmt = $db->query($query);

// Recorrido de las hamburguesas
while ($hamburguesa = $stmt->fetch()) {
  ?>
  <div class="hamburguesa">
    <img src="<?php echo $hamburguesa['imagen']; ?>" alt="<?php echo $hamburguesa['nombre']; ?>">
    <h3><?php echo $hamburguesa['nombre']; ?></h3>
    <p><?php echo $hamburguesa['descripcion']; ?></p>
    <span class="precio"><?php echo $hamburguesa['precio']; ?>€</span>
  </div>
  <?php
}

?>

</body>
</html>
