
  document.addEventListener('DOMContentLoaded', function() {
    const botonesAñadir = document.querySelectorAll('.añadir-producto');
    const listaProductos = document.getElementById('lista-productos');
    const totalSpan = document.getElementById('total');

    let total = 0;
    const carrito = {};
//Añadir Producto
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
//Mostrar Contenido Producto
    function renderizarCarrito() {
      listaProductos.innerHTML = '';

      for (const producto in carrito) {
        const item = document.createElement('li');
    
        const nombreProducto = document.createElement('div');
        nombreProducto.textContent = `${producto}`;
        item.appendChild(nombreProducto);
    
        const cantidadProducto = document.createElement('div');
        cantidadProducto.classList.add('cantidad');
        cantidadProducto.textContent = 'Cantidad:';
        const botonRestar = document.createElement('button');
        botonRestar.textContent = '-';
        botonRestar.addEventListener('click', () => {
          if (carrito[producto].cantidad > 1) {
            carrito[producto].cantidad--;
            total -= carrito[producto].precio;
            totalSpan.textContent = total.toFixed(2);
            renderizarCarrito();
          }
        });
        cantidadProducto.appendChild(botonRestar);
    
        const cantidadTexto = document.createElement('div');
        cantidadTexto.textContent = ` ${carrito[producto].cantidad} `;
        cantidadProducto.appendChild(cantidadTexto);
    
        const botonSumar = document.createElement('button');
        botonSumar.textContent = '+';
        botonSumar.addEventListener('click', () => {
          carrito[producto].cantidad++;
          total += carrito[producto].precio;
          totalSpan.textContent = total.toFixed(2);
          renderizarCarrito();
        });
        cantidadProducto.appendChild(botonSumar);
    
        item.appendChild(cantidadProducto);
    
        const precioProducto = document.createElement('div');
        precioProducto.textContent = `Precio: ${carrito[producto].precio.toFixed(2)}€`;
        item.appendChild(precioProducto);
    
        listaProductos.appendChild(item);
      }
    }
  });

