<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Postres</title>
  <link rel="stylesheet" href="postres.css">
</head>
<body>
  <?php

include 'db.php';
include 'navbar.php';


// Consulta para obtener los postres
$query = 'SELECT * FROM postres';

// Ejecución de la consulta
$stmt = $db->query($query);
?>

<div id="postres">

<?php
// Recorrido de los postres
while ($postre = $stmt->fetch()) {
  ?>
  <div class="postre">
    <img src="<?php echo $postre['imagen']; ?>" alt="<?php echo $postre['nombre']; ?>">
    <h3><?php echo $postre['nombre']; ?></h3>
    <p><?php echo $postre['descripcion']; ?></p>
    <span class="precio"><?php echo $postre['precio']; ?>€</span>
  </div>
  <?php
}

?>
</div>

</body>
</html>