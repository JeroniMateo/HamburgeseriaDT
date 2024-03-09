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
<div id="contenedor">

  <div id="hamburguesas">
<?php
// Recorrido de las hamburguesas
while ($hamburguesa = $stmt->fetch()) {
  ?>
  <div class="hamburguesa">
    <img src="<?php echo $hamburguesa['imagen']; ?>" alt="<?php echo $hamburguesa['nombre']; ?>">
    <h3><?php echo $hamburguesa['nombre']; ?></h3>
    <p><?php echo $hamburguesa['descripcion']; ?></p>
    <span class="precio"><?php echo $hamburguesa['precio']; ?>€</span>
    <button class="añadir-producto" data-producto="<?php echo $hamburguesa['nombre']; ?>" data-precio="<?php echo $hamburguesa['precio']; ?>">Añadir Producto</button>

  </div>
  <?php
}
?>

</div>
<div id="carrito">
  <h2>TU PEDIDO</h2>
  <ul id="lista-productos"></ul>
  <p>Total: <span id="total">0</span>€</p>
</div>
</div>
<script src="carrito.js"></script>
</body>
</html>
