<?php 
  require_once '../../config/config.php'; 
  session_start();
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
        <div class="logo"><img src="./assets/img/flight-dreams-logo-traz-cut.png" alt="" /></div>
        <div class="menu">
          <a href="<?php echo BASE_URL; ?>config/routes.php?controller=admin&action=verReservasAdmin">🏠 Ver vuelos</a>
          <a href="#">🏠 Ver cruceros</a>
          <a href="#">🏠 Ver trenes</a>
          <a href="#">🏠 Calendario</a>
          <a href="#">⚙️ Configuración</a>
          <a href="#">🏠 Clientes</a>
          <a href="#">🏠 Etc</a>
          <a href="#">🏠 Etc</a>
          <a href="#">🏠 Etc</a>
        </div>
      </div>
    </section>
  </body>
</html>
