<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Complementos</title>
  <link rel="stylesheet" href="complementos.css">
</head>
<body>

<?php

include 'db.php';
include 'navbar.php';


// Consulta para obtener los complementos
$query = 'SELECT * FROM complementos';

// Ejecución de la consulta
$stmt = $db->query($query);

// Recorrido de los complementos
while ($complemento = $stmt->fetch()) {
  ?>
  <div class="complemento">
    <img src="<?php echo $complemento['imagen']; ?>" alt="<?php echo $complemento['nombre']; ?>">
    <h3><?php echo $complemento['nombre']; ?></h3>
    <p><?php echo $complemento['descripcion']; ?></p>
    <span class="precio"><?php echo $complemento['precio']; ?>€</span>
  </div>
  <?php
}

?>

</body>
</html>