<?php 
  require_once '../config/config.php'; 
  verificarSesion();
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
<body class="login-body">
  
  <?php include '../views/header.php'; ?>

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
                    <th>Servicio</th>
                    <th>Destino</th>
                    <th>Personas</th>
                    <th>Fecha inicial</th>
                    <th>Estado</th>
                    <th>Cancelar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($reservas as $index => $reserva): ?>
                    <tr>
                      <td><?php echo $index + 1; ?></td>
                      <td><?php echo htmlspecialchars($reserva['servicio']); ?></td>
                      <td><?php echo htmlspecialchars($reserva['destino_salida']); ?></td>
                      <td><?php echo htmlspecialchars($reserva['personas']); ?></td>
                      <td><?php echo htmlspecialchars($reserva['fecha_inicio']); ?></td>
                      <td>
                        <span class="badge bg-<?php echo $reserva['estado'] == 'confirmado' ? 'success' : ($reserva['estado'] == 'pendiente' ? 'warning' : 'secondary'); ?>">
                          <?php echo htmlspecialchars($reserva['estado']); ?>
                        </span>
                      </td>
                      <td>
                        <?php if ($reserva['estado'] !== 'cancelado'): ?>
                            <form method="POST" action="../config/routes.php?controller=viajes&action=actualizarEstado" class="btn btn-primary btn-sm">
                                <input type="hidden" name="id_viajes" value="<?php echo $reserva['id_viajes']; ?>">
                                <button type="submit">
                                    <i class="fa-solid fa-trash"></i> 
                                    Cancelar
                                </button>
                            </form>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else: ?>
              <p class="text-center">No tienes reservas registradas.</p>
            <?php endif; ?>
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