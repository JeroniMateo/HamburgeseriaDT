<?php
include 'db.php';

// Obtener los parámetros del cuerpo de la solicitud POST
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

// Consulta SQL para insertar el producto en la tabla 'pedido'
$sql = "INSERT INTO Pedido (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)";

// Preparar la consulta
$stmt = $db->prepare($sql);

// Vincular parámetros
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':descripcion', $descripcion);
$stmt->bindParam(':precio', $precio);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Producto agregado exitosamente";
} else {
    echo "Error al agregar el producto: " . $stmt->errorInfo()[2];
}


