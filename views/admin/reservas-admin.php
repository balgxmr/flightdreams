<?php 
  require_once __DIR__ . '/../../config/config.php';
  verificarSesionAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Reservas</title>
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
                    <a href="?controller=admin&action=verReservasAdmin&estado=" class="btn btn-primary me-2">Ver Todas</a>
                    <a href="?controller=admin&action=verReservasAdmin&estado=pendiente" class="btn btn-warning me-2">Pendientes</a>
                    <a href="?controller=admin&action=verReservasAdmin&estado=confirmado" class="btn btn-success me-2">Confirmadas</a>
                    <a href="?controller=admin&action=verReservasAdmin&estado=cancelado" class="btn btn-secondary">Canceladas</a>
                </div>
                <div class="card mt-5">
                  <div class="card-body">
                    <?php if (!empty($reservas)): ?>
                      <div class="table-responsive">
                        <table class="table table-striped table-hover">
                          <thead class="table-primary">
                            <tr>
                              <th>#</th>
                              <th>Nombre del usuario</th>
                              <th>Correo</th>
                              <th>Telefono</th>
                              <th>Nombre del paquete</th>
                              <th>Servicio</th>
                              <th>Destino</th>
                              <th>Personas</th>
                              <th>Fecha inicial</th>
                              <th>Estado</th>
                              <th>Visa</th>
                              <th>Cancelar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($reservas as $index => $reserva): ?>
                              <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($reserva['nombre_usuario']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['Correo']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['Telefono']); ?></td>
                                <td><?php echo !empty($reserva['nombre_paquete']) ? htmlspecialchars($reserva['nombre_paquete']) : 'No disponible'; ?></td>
                                <td><?php echo htmlspecialchars($reserva['servicio']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['destino_salida']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['personas']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['fecha_inicio']); ?></td>
                                <td>
                                  <span class="badge bg-<?php echo $reserva['estado'] == 'confirmado' ? 'success' : ($reserva['estado'] == 'pendiente' ? 'warning' : 'secondary'); ?>">
                                    <?php echo htmlspecialchars($reserva['estado']); ?>
                                  </span>
                                </td>
                                <td><?php echo $reserva['visa'] === 0 ? 'no' : ($reserva['visa'] === 1 ? 'sí' : 'no'); ?></td>
                                <td>
                                  <form action="../config/routes.php?controller=admin&action=actualizarEstado" method="POST">
                                    <div class="form-group">
                                      <!-- <label for="estado">Estado</label> -->
                                      <select name="estado" id="estado" class="form-control">
                                        <option value="cancelado" <?= $reserva['estado'] == 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                                        <option value="confirmado" <?= $reserva['estado'] == 'confirmado' ? 'selected' : '' ?>>Confirmado</option>
                                        <option value="pendiente" <?= $reserva['estado'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                      </select>
                                    </div>

                                    <input type="hidden" name="id_viajes" value="<?= $reserva['id_viajes'] ?>">
                                    
                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar Estado</button>
                                  </form>
                                </td>
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