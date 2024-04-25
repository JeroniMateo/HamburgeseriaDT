<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con tarjeta</title>
    <link rel="stylesheet" href="pago.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Realizar pago del Pedido:</h2>
        <form action="procesar_pago.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre en la tarjeta:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="numero">Número de tarjeta:</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="expiracion">Fecha de expiración:</label>
                    <input type="text" class="form-control" id="expiracion" name="expiracion" placeholder="MM/AA" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" required>
                </div>
            </div>
            <button id="pagar" type="submit" class="btn btn-primary">Pagar</button>
        </form>
    </div>
    <script src="pago.js"></script>
</body>
</html>
