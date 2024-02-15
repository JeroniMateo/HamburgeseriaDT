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

// Consulta para obtener las bebidas
$query = 'SELECT * FROM bebidas';

// Ejecución de la consulta
$stmt = $db->query($query);

// Recorrido de las bebidas
while ($bebida = $stmt->fetch()) {
  ?>
  <div class="bebida">
    <img src="<?php echo $bebida['imagen']; ?>" alt="<?php echo $bebida['nombre']; ?>">
    <h3><?php echo $bebida['nombre']; ?></h3>
    <p><?php echo $bebida['descripcion']; ?></p>
    <span class="precio"><?php echo $bebida['precio']; ?>€</span>
  </div>
  <?php
}

?>
</body>
</html>