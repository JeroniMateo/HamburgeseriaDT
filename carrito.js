
  document.addEventListener('DOMContentLoaded', function() {
    const botonesAñadir = document.querySelectorAll('.añadir-producto');
    const listaProductos = document.getElementById('lista-productos');
    const totalSpan = document.getElementById('total');

    let total = 0;
    const carrito = {};

    function añadirProducto(producto, precio) {
      if (carrito[producto]) {
        carrito[producto].cantidad++;
      } else {
        carrito[producto] = {
          cantidad: 1,
          precio: precio
        };
      }

      total += precio;
      totalSpan.textContent = total.toFixed(2);

      renderizarCarrito();
    }

    botonesAñadir.forEach(boton => {
      boton.addEventListener('click', () => {
        const producto = boton.getAttribute('data-producto');
        const precio = parseFloat(boton.previousElementSibling.getAttribute('data-precio'));
        añadirProducto(producto, precio);
      });
    });

    function renderizarCarrito() {
      listaProductos.innerHTML = '';

      for (const producto in carrito) {
        const item = document.createElement('li');
        item.textContent = `${producto} - Cantidad: ${carrito[producto].cantidad} - Precio: ${carrito[producto].precio.toFixed(2)}€`;
        listaProductos.appendChild(item);
      }
    }
  });

