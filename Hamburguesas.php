<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Hamburguesas</title>
  <link rel="stylesheet" href="hamburguesas.css">
</head>
<body>

<?php
include 'db.php';
include 'navbar.php';

// Consulta para obtener las hamburguesas
$query = 'SELECT * FROM hamburguesas';

// Ejecución de la consulta
$stmt = $db->query($query);
?>
  <div class="hamburguesas">
<?php
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

</div>

</body>
</html>
