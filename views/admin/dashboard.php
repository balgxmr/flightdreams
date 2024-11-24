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
    <?php include '../../views/aside-admin.php'?>

    <main class="mainContent dashboardMain">
      <div class="container-fluid">
        <section class="mainContainerAdmin">
          <div class="paddingContentAdmin">
            <div class="bg-primary text-white text-center p-3 mb-3">
              <h5 class="m-0">Bienvenido al dashboard de Administrador</h5> 
            </div>
            <p class="text-center">Elige una de las opciones disponibles en el panel lateral izquierdo.</p>
            <!-- <img class="centeredImage" src="../../public/images/dashboard.png" alt=""> -->
          </div>
        </section>
      </div>
    </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
