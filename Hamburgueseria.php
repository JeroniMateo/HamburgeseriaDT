<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hamburguesería - App para pedidos</title>
    <link rel="stylesheet" href="hamburgueseria.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>

    <header>
      <h1>BIENVENIDO A LA HAMBURGUESERIA DT</h1>
      <?php session_start(); ?>
      <div id="login_buttons">
      <!-- Si el usuario esta registrado hacemos que aprezca su nombre -->
      <?php if (isset($_SESSION['username'])): ?>
        <!-- Si el usuario está logueado, mostrar su nombre -->
        <span>Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        <a href="User/logout.php" class="btn btn-danger">Cerrar Sesión</a>
      <!-- en caso contrario que aparezca la opcion de iniciar o crearse usuario -->
      <?php else: ?>
        <!-- Si no, mostrar los botones de login y sign up -->
        <a href="User/login.php" id="login" class="btn custom-btn login-btn">Login</a>
        <a href="User/signup.php" id="signin" class="btn custom-btn signup-btn">Sign Up</a>
      <?php endif; ?>
    </div>
    </header>
    <div id="navbar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" id="mainNavbar" href="Hamburgueseria.php">Hamburgueseria DT</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="hamburguesas.php"
                >Hamburguesas</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="complementos.php">Complementos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bebidas.php">Bebidas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="postres.php">Postres</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menus.php">Menús</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
  </div>
    <div id="pedidos">
      <section class="contenido-menu"></section>
      <section class="pedido">
        <h2>Tu pedido</h2>
        <ul></ul>
        <p class="total">Total: €0</p>
        <button class="boton">Realizar pedido</button>
      </section>
    </div>
  </body>
</html>
