function cancelarPedido() {
    // Selecciona el botón "Vaciar Carrito" por su id
    var vaciarCarritoBtn = document.getElementById("vaciar-carrito");

    // Agrega un evento de clic al botón "Vaciar Carrito"
    vaciarCarritoBtn.addEventListener("click", function() {
        // Selecciona la lista de productos por su id
        var listaProductos = document.getElementById("lista-productos");
        
        // Vacía la lista de productos
        listaProductos.innerHTML = "";
        
        // Actualiza el total a cero
        var totalElement = document.getElementById("total");
        totalElement.textContent = "0";
    });
};



function pagar() {
  window.location.href = "pago.php"; 
};




// Recuperar la información del carrito almacenada en localStorage, si existe
document.addEventListener("DOMContentLoaded", function() {
  var carrito = localStorage.getItem('carrito');
  if (carrito) {
    document.getElementById('lista-productos').innerHTML = carrito;
  }
});

// Manejar el evento de vaciar el carrito
document.getElementById('vaciar-carrito').addEventListener('click', function() {
  // Vaciar el carrito
  document.getElementById('lista-productos').innerHTML = '';
  // Limpiar el localStorage
  localStorage.removeItem('carrito');
});