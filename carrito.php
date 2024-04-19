
Si prefieres manejar todo en un solo archivo PHP para mantener las cosas simples y centralizadas, puedes integrar la lógica del formulario y el procesamiento de los botones en el mismo archivo. A continuación, te muestro cómo podrías estructurarlo:

Paso 1: Combinar HTML y PHP en un Solo Archivo
Puedes colocar tanto el formulario como el código de procesamiento en el mismo archivo PHP, gestionando las acciones en base a la entrada del formulario. Aquí tienes un ejemplo de cómo podría ser:

carrito.php

php
Copy code
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
