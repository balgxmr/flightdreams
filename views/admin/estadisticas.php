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
        <!-- Resumen de estadísticas -->
        <div class="row text-center mb-4">
            <h1 class="mb-5">Estadísticas actuales</h1>
            <div class="col-2">
                <div class="card border-0 bg-light shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-1">Facebook</h6>
                        <h5 class="fw-bold m-0">+2</h5>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card border-0 bg-light shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-1">Instagram</h6>
                        <h5 class="text-success fw-bold m-0">+11</h5>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card border-0 bg-light shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-1">Pinterest</h6>
                        <h5 class="text-danger fw-bold m-0">+78</h5>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card border-0 bg-light shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-1">Twitter</h6>
                        <h5 class="text-success fw-bold m-0">+1</h5>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card border-0 bg-light shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-1">YouTube</h6>
                        <h5 class="text-danger fw-bold m-0">+7</h5>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card border-0 bg-light shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase text-muted mb-1">Sitio Web</h6>
                        <h5 class="text-danger fw-bold m-0">+459</h5>
                    </div>
                </div>
            </div>
        </div>
        <section class="mainContainerAdmin paddingContentAdmin">
          <div class="container my-5">
            <div class="row g-4">
                <!-- Total de Reservas -->
                <div class="col-md-4">
                    <div class="card text-white bg-primary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Total de Reservas</h5>
                            <p class="card-text fs-3">5</p>
                        </div>
                    </div>
                </div>

                <!-- Reservas por Estado -->
                <div class="col-md-4">
                    <div class="card text-white bg-secondary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Reservas por Estado</h5>
                            <p class="card-text fs-3">5</p>
                        </div>
                    </div>
                </div>

                <!-- Paquete Más Vendido -->
                <div class="col-md-4">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Paquete Más Vendido</h5>
                            <p class="card-text fs-3">Atlantis Map</p>
                        </div>
                    </div>
                </div>

                <!-- Nacionalidad Más Repetida -->
                <div class="col-md-4">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body">
                            <h5 class="card-title">Nacionalidad Más Repetida</h5>
                            <p class="card-text fs-3">Panameña</p>
                        </div>
                    </div>
                </div>

                <!-- Servicio Más Reservado -->
                <div class="col-md-4">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <h5 class="card-title">Servicio Más Reservado</h5>
                            <p class="card-text fs-3">Crucero</p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>