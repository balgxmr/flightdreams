<aside class="dashboardSidebar">
  <div>
    <div class="logo">
      <a href="<?php echo BASE_URL; ?>views/admin/dashboard.php">
        <img src="<?php echo BASE_URL; ?>public/images/flight-dreams-logo-traz-cut.png" alt="" />
      </a>
    </div>
    <div class="menu">
      <a href="<?php echo BASE_URL; ?>config/routes.php?controller=admin&action=verReservasAdmin"><i class="fa-solid fa-eye"></i> Ver reservas</a>
      <a href="#"><i class="fa-solid fa-chart-simple"></i> Estadísticas</a>
      <a href="<?php echo BASE_URL; ?>config/routes.php?controller=admin&action=listarAdmin"><i class="fa-solid fa-cube"></i> Ver paquetes</a>
      <!-- <a href="#"><i class="fa-solid fa-clock"></i> Actualizar estado</a> -->
      <a href="<?php echo BASE_URL; ?>config/routes.php?controller=admin&action=insertarPaquete"><i class="fa-solid fa-right-to-bracket"></i> Ingresar paquete</a>
    </div>
  </div>
</aside>