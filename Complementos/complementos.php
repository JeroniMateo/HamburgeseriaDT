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
?>
<div id="contenedor">
  <div id="complementos">
<?php
// Recorrido de los complementos
while ($complemento = $stmt->fetch()) {
  ?>
  <div class="complemento">
    <img src="<?php echo $complemento['imagen']; ?>" alt="<?php echo $complemento['nombre']; ?>">
    <h3><?php echo $complemento['nombre']; ?></h3>
    <span class="precio" data-precio="<?php echo $complemento['precio']; ?>"><?php echo $complemento['precio']; ?>€</span>
    <button class="añadir-producto" data-producto="<?php echo $complemento['nombre']; ?>" data-precio="<?php echo $complementoº['precio']; ?>">Añadir Producto</button>
  </div>
  <?php
}
include 'carrito.php';
?>
</div>
</div>
</body>
</html>