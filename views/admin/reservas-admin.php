<?php 
  require_once '../config/config.php'; 
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
<body class="">

  <hr>

  <section class="mainContainer">
    <div class="container-fluid px-0">
      <div class="row gx-0 justify-content-center align-items-center">
        <div class="col-12">
          <h2 class="mainContainer--title">Historial de Reservas</h2>
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
                            <?php if ($reserva['estado'] !== 'cancelado'): ?>
                                <form method="POST" class="d-flex align-items-center justify-content-center" action="../config/routes.php?controller=viajes&action=actualizarEstado">
                                    <input type="hidden" name="id_viajes" value="<?php echo $reserva['id_viajes']; ?>">
                                    <button type="submit" class="btn btn-primary btn-sm text-white d-flex align-items-center">
                                        <i class="fa-solid fa-trash me-2"></i> 
                                        Cancelar
                                    </button>
                                </form>
                            <?php endif; ?>
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
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>