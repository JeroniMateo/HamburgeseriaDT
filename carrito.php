
<?php
session_start();
include 'db.php';

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == 'pagar') {
            // Lógica para procesar el pago
            // Redireccionar a la página de confirmación del pedido
            header("Location: Hamburgueseria.php");
            exit();
        } elseif ($_POST['accion'] == 'cancelar') {
            // Lógica para cancelar el pedido
            $sql = "TRUNCATE TABLE Pedido"; // Asegúrate de que esta es la lógica correcta para tu aplicación
            if ($db->query($sql) === TRUE) {
                header("Location: carrito.php"); // Refrescar la página del carrito
                exit();
            } else {
                echo "Error al limpiar el carrito: ";
            }
        }
    }
}


?>

</div>
<div id="carrito">
  <h2>TU PEDIDO</h2>
  <ul id="lista-productos">
  <?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Consulta SQL para obtener los productos del pedido
$sql = "SELECT * FROM Pedido";
// Preparar la consulta
$stmt = $db->prepare($sql);
// Ejecutar la consulta
$stmt->execute();
// Obtener los resultados
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar si hay resultados
if ($resultados) {
    // Iterar sobre los resultados y mostrar cada producto en la lista
    foreach ($resultados as $row) {
        echo '<li>' . $row['nombre'] . ' - Precio: ' . $row['precio'] . '</li>';
    }
} else {
    // Si no hay resultados, mostrar un mensaje indicando que el pedido está vacío
    echo '<li>No hay productos en el pedido</li>';
}
?>

  </ul>
  <p>Total: <span id="total">0</span>€</p>
  <div id="botonesCarrito">
   <form action="carrito.php" method="post">
            <button type="submit" name="accion" value="pagar" class="btn btn-success">Pagar</button>
            <button type="submit" name="accion" value="cancelar" class="btn btn-warning">Cancelar</button>
            <?php
// Verificar si se ha enviado el formulario y se ha pulsado el botón con nombre "addCantidad"
if (isset($_POST['addCantidad'])) {
    // Incluir el archivo de conexión a la base de datos
    include 'db.php';

    // Consulta SQL para sumar 1 a la columna cantidad
    $sql = "UPDATE pedido SET cantidad = cantidad + 1 WHERE nombre = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    // Comprobar si se realizó la actualización correctamente
    if ($stmt->rowCount() > 0) {
        // La cantidad se sumó correctamente
        echo "Cantidad sumada correctamente";
    } else {
        // Hubo un problema al sumar la cantidad
        echo "Error al sumar la cantidad";
    }
}
?>
        </form>
  </div>
</div>



</div>
<script src="carrito.js"></script>
<script src="botonera-carrito.js"></script>
