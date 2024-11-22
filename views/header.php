<?php
require_once __DIR__ . '/../config/config.php';
?>

<section class="infoBar">
  <div class="infoBar--box">
    <i class="fa-brands fa-instagram fa-lg"></i>
    <p class="infoBar--text">@fligthsdream</p>
  </div>
  <div class="infoBar--box">
    <i class="fa-solid fa-phone"></i>
    <p class="infoBar--text">+(507) 301-1101</p>
  </div>
  <div class="infoBar--box">
    <i class="fa-brands fa-whatsapp"></i>
    <p class="infoBar--text">+(507) 6111-1111</p>
  </div>
  <div class="infoBar--box">
    <i class="fa-solid fa-location-dot"></i>
    <p class="infoBar--text">Calle Garibay,4,1ra Dr- Dr, Donostia, Guipúzcoa,20004</p>
  </div>
</section>

<header class="header">
  <div>
    <div class="header--logo">
      <a href="<?php echo BASE_URL; ?>public/index.php">
        <img src="<?php echo BASE_URL; ?>public/images/flight-dreams-logo-traz-cut.png" alt="flightDreams" />
      </a>
    </div>
  </div>

  <div class="header">
    <a href="<?php echo BASE_URL; ?>public/index.php" class="header--link">
      <p>Inicio</p>
    </a>

    <div class="dropdown p-4 header--link">
      <a class="dropdown-toggle text-decoration-none text-body-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/servicios/billetes_aereos.php">Billétes Aéreos</a></li>
        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/servicios/autobuses.php">Autobuses</a></li>
        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/servicios/cruceros.php">Crucero</a></li>
        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/servicios/trenes.php">Trenes</a></li>
        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/servicios/vuelos.php">Vuelos</a></li>
        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/servicios/hoteles.php">Hoteles</a></li>
        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/servicios/pasadia.php">Pasadía</a></li>
      </ul>
    </div>

    <a href="<?php echo BASE_URL; ?>config/routes.php?controller=paquete&action=listar" class="header--link">
      <p>Paquetes</p>
    </a>
    <a href="<?php echo BASE_URL; ?>views/servicios/visas.php" class="header--link">
      <p>Visas</p>
    </a>
    <a href="<?php echo BASE_URL; ?>views/about-us/about-us.php" class="header--link">
      <p>Sobre Nosotros</p>
    </a>
  </div>

  <div>
    <a href="<?php echo BASE_URL; ?>views/usuarios/login.php">
      <button type="button" class="btn btn-success">Login</button>
    </a>
  </div>
</header>
