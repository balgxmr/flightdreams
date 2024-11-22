<?php require_once '../config/config.php';?>

<h2>Mis Reservas</h2>

<?php if (!empty($reservas)): ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Destino</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($reservas as $index => $reserva): ?>
        <tr>
          <td><?php echo $index + 1; ?></td>
          <td><?php echo htmlspecialchars($reserva['id_viajes']); ?></td>
          <td><?php echo htmlspecialchars($reserva['Estado']); ?></td>
          <td><?php echo htmlspecialchars($reserva['id_usuario']); ?></td>
          <td>
            <a href="<?php echo BASE_URL . 'config/routes.php?controller=viajes&action=verReserva&id=' . $reserva['id']; ?>" class="btn btn-primary">Ver Detalle</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>No tienes reservas registradas.</p>
<?php endif; ?>

