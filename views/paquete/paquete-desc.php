<?php
// views/descripcion_paquete.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Descripción del Paquete</title>
  <link rel="stylesheet" href="../public/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/5ddbd215bf.js" crossorigin="anonymous"></script>
  <link rel="icon" href="<?php echo BASE_URL; ?>public/images/flightdreams-logo-clean.png" type="image/x-icon">
</head>
<body>
  <?php include '../views/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <?php if (!empty($paquete['Foto'])): ?>
        <img src="../config/mostrarImagen.php?id=<?= $paquete['id_paquete'] ?>" alt="Imagen del Paquete">
      <?php endif; ?>
      <div class="col-md-7 ps-md-5">
        <p class="h2"><?php echo $paquete['Nombre']; ?></p>
        <p class="h6"><?php echo $paquete['Descripcion']; ?></p>
        <p>Destino: <?php echo $paquete['Destino']; ?></p>
        <p>Precio: $<?php echo $paquete['Precio']; ?></p>
        <p>Fecha de Inicio: <?php echo $paquete['Fecha_inicio']; ?></p>
        <p>Fecha Final: <?php echo $paquete['Fecha_final']; ?></p>

        <p class="fw-bold">Itinerario:</p>
        <p><?php echo $paquete['itinerario']; ?></p>
      </div>
    </div>
  </main>

  <?php include '../views/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
