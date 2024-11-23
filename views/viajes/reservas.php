<?php require_once '../config/config.php'; ?>

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
<body class="login-body">
  
  <?php include '../views/header.php'?>

  <section class="vh-100">
  <div class="container-fluid px-0">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h2 class="text-center my-2">Historial de Reservas</h2>
          </div>
          <div class="card-body">
            <?php if (!empty($reservas)): ?>
              <table class="table table-striped table-hover">
                <thead class="table-primary">
                  <tr>
                    <th>#</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($reservas as $index => $reserva): ?>
                    <tr>
                      <td><?php echo $index + 1; ?></td>
                      <td>
                        <span class="badge bg-<?php echo $reserva['Estado'] == 'Completado' ? 'success' : ($reserva['Estado'] == 'En curso' ? 'warning' : 'secondary'); ?>">
                          <?php echo htmlspecialchars($reserva['Estado']); ?>
                        </span>
                      </td>
                      <td><?php echo htmlspecialchars($reserva['Destino_final']); ?></td>
                      <td><?php echo htmlspecialchars($reserva['Personas']); ?></td>
                      <td><?php echo htmlspecialchars($reserva['Servicios']); ?></td>
                      <td><?php echo htmlspecialchars($reserva['Fecha_inicio']); ?></td>
                      <td>
                        <a href="<?php echo BASE_URL . 'config/routes.php?controller=viajes&action=verReserva&id=' . $reserva['id_viajes']; ?>" class="btn btn-primary btn-sm">
                          <i class="fa-solid fa-trash"></i> Eliminar
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else: ?>
              <p class="text-center">No tienes reservas registradas.</p>
            <?php endif; ?>
          </div>
          <div class="card-footer text-center">
            <a href="<?php echo BASE_URL . 'config/routes.php?controller=usuario&action=dashboard'; ?>" class="btn btn-secondary">
              <i class="fa-solid fa-arrow-left"></i> Volver al Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <?php include '../views/footer.php'?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
