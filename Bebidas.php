<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bebidas</title>
  <link rel="stylesheet" href="bebidas.css">
</head>
<body>

<?php

include 'db.php';
include 'navbar.php';


// Consulta para obtener las bebidas
$query = 'SELECT * FROM bebidas';

// Ejecución de la consulta
$stmt = $db->query($query);
?>
  <div id="bebidas">
<?php
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
</div>
</body>
</html>