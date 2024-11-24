<?php 
  require_once __DIR__ . '/../../config/config.php';

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
verificarSesionAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Paquetes</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300..900&family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="../public/css/style.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Iconos: Font-Awesome -->
  <script src="https://kit.fontawesome.com/5ddbd215bf.js" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo BASE_URL; ?>public/images/flightdreams-logo-clean.png" type="image/x-icon">
</head>

<body class="gridContainer">
  <?php include '../views/aside-admin.php'?>

  <main class="mainContent">
    <div class="container-fluid">
      <section class="mainContainerAdmin">
        <div class="paddingContentAdmin">
          <div class="bg-primary text-white p-3 mb-3">
            <h5 class="m-0">Historial de Reservas</h5>
          </div>
          <form method="POST" action="../config/routes.php?controller=viajes&action=reservar">
            <div class="row gx-0 justify-content-center align-items-center">
              <div class="col-12">

                <!-- Filtro de estado -->
                <div class="d-flex justify-content-start mb-3">
                    <a href="?controller=admin&action=listarAdmin&servicio=" class="btn btn-primary me-2">Ver Todas</a>
                    <a href="?controller=admin&action=listarPorServicioAdmin&servicio=autobuses" class="btn btn-warning me-2">Autobuses</a>
                    <a href="?controller=admin&action=listarPorServicioAdmin&servicio=hoteles" class="btn btn-success me-2">Hoteles</a>
                    <a href="?controller=admin&action=listarPorServicioAdmin&servicio=cruceros" class="btn btn-primary me-2">Cruceros</a>
                    <a href="?controller=admin&action=listarPorServicioAdmin&servicio=trenes" class="btn btn-warning me-2">Trenes</a>
                    <a href="?controller=admin&action=listarPorServicioAdmin&servicio=vuelos" class="btn btn-success me-2">Vuelos</a>

                </div>
                <div class="card mt-5">
                  <div class="card-body">
                    <?php if (!empty($paquetes)): ?>
                      <div class="table-responsive">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Destino</th>
                              <th class="text-center">Precio</th>
                              <th class="text-center">Fecha Inicial</th>
                              <th class="text-center">Fecha Final</th>
                              <th class="text-center">Duracion</th>
                              <th class="text-center">Servicio</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($paquetes as $index => $paquete): ?>

                                <?php
                                    // Calcular la duración entre las fechas
                                    $fechaInicio = new DateTime($paquete['Fecha_inicio']);
                                    $fechaFinal = new DateTime($paquete['Fecha_final']);
                                    $duracion = $fechaInicio->diff($fechaFinal)->days; // Diferencia en días
                                ?>
                                
                              <tr>
                                <td class="text-center"><?php echo $index + 1; ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($paquete['Nombre']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($paquete['Destino']); ?></td>
                                <td class="text-center"><?php echo number_format($paquete['Precio'], 2); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($paquete['Fecha_inicio']) ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($paquete['Fecha_final']); ?></td>
                                <td class="text-center"><?php echo $duracion; ?> dias</td>
                                <td class="text-center"><?php echo htmlspecialchars($paquete['servicio']); ?></td>
                            
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    <?php else: ?>
                      <p class="text-center">No tienes reservas registradas.</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </main>

</body>

</html>