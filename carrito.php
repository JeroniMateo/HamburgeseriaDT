
<?php
session_start();
include 'db.php';

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == 'pagar') {
            // Lógica para procesar el pago
            // Redireccionar a la página de confirmación del pedido
            header("Location: Hamburgueseria.Html");
            exit();
        } elseif ($_POST['accion'] == 'cancelar') {
            // Lógica para cancelar el pedido
            $sql = "TRUNCATE TABLE Pedido"; // Asegúrate de que esta es la lógica correcta para tu aplicación
            if ($conn->query($sql) === TRUE) {
                header("Location: carrito.php"); // Refrescar la página del carrito
                exit();
            } else {
                echo "Error al limpiar el carrito: " . $conn->error;
            }
        }
    }
}

$conn->close();
?>

</div>
<div id="carrito">
  <h2>TU PEDIDO</h2>
  <ul id="lista-productos"></ul>
  <p>Total: <span id="total">0</span>€</p>
  <div id="botonesCarrito">
   <form action="carrito.php" method="post">
            <button type="submit" name="accion" value="pagar" class="btn btn-success">Pagar</button>
            <button type="submit" name="accion" value="cancelar" class="btn btn-warning">Cancelar</button>
        </form>
  </div>
</div>
</div>
<script src="carrito.js"></script>
<script src="botonera-carrito.js"></script>
