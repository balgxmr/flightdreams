<?php 
  require_once __DIR__ . '/../../config/config.php';

  // Comprobar si la sesión ya está iniciada
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  verificarSesionAdmin();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/style.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Iconos: Font-Awesome -->
    <script src="https://kit.fontawesome.com/5ddbd215bf.js" crossorigin="anonymous"></script>
  </head>
  <body class="gridContainer">
    <section class="dashboardSidebar">
      <div>
        <div class="logo">
          <a href="<?php echo BASE_URL; ?>views/admin/dashboard.php"><img src="<?php echo BASE_URL; ?>public/images/flight-dreams-logo-traz-cut.png" alt="" /></a>
        </div>
        <div class="menu">
          <a href="<?php echo BASE_URL; ?>config/routes.php?controller=admin&action=verReservasAdmin"><i class="fa-solid fa-cube"></i> Ver paquetes</a>
          <a href="#"><i class="fa-solid fa-chart-simple"></i> Estadísticas</a>
          <a href="#"><i class="fa-solid fa-eye"></i> Ver reservas</a>
          <a href="#"><i class="fa-solid fa-clock"></i> Actualizar estado</a>
          <a href="#"><i class="fa-solid fa-right-to-bracket"></i> Ingresar paquete</a>
        </div>
      </div>
    </section>
  </body>
</html>
