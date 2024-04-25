<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bebidas</title>
  <link rel="stylesheet" href="bebidas.css">
</head>
<body>

<?php

include '../DB/db.php';
include '../navbar.php';


// Consulta para obtener las bebidas
$query = 'SELECT * FROM bebidas';

// Ejecución de la consulta
$stmt = $db->query($query);
?>
<div id="contenedor">
  <div id="bebidas">
<?php
// Recorrido de las bebidas
while ($bebida = $stmt->fetch()) {
  ?>
  <div class="bebida">
    <img src="<?php echo $bebida['imagen']; ?>" alt="<?php echo $bebida['nombre']; ?>">
    <h3><?php echo $bebida['nombre']; ?></h3>
    <span class="precio" data-precio="<?php echo $bebida['precio']; ?>"><?php echo $bebida['precio']; ?>€</span>
    <button class="añadir-producto" data-producto="<?php echo $bebida['nombre']; ?>" data-precio="<?php echo $bebida['precio']; ?>">Añadir Producto</button>

  </div>
  <?php
}
include '../Carrito/carrito.php';
?>
</div>
</div>
</body>
</html>