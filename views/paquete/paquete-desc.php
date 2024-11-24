<?php
  require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Descripción del Paquete</title>
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
    <!-- Favicon -->
  <link rel="icon" href="<?php echo BASE_URL; ?>public/images/flightdreams-logo-clean.png" type="image/x-icon">
  </head>
  <body>
    <?php include '../../views/header.php'; ?>

    <main class="container mt-5">
      <div class="row">
        <!-- Imagen a la izquierda -->
        <div class="col-md-5">
          <img class="img-fluid rounded" src="../../public/images/canal-panama.jpg" alt="Canal de Panamá" />
        </div>

        <!-- Información a la derecha -->
        <div class="col-md-7 ps-md-5">
          <p class="h2">América</p>
          <p class="h6">Bogotá Paquete Turístico: Experiencia Histórica y Cultural</p>
          <p>Descubre Bogotá con nuestro paquete turístico completo! Por persona en habitación doble, disfrutarás de una emocionante aventura en la capital de Colombia. A continuación, detallamos todo lo que incluye y lo que no:</p>

          <p class="fw-bold">Incluye:</p>
          <ul>
      li>Traslados en Bogotá: aeropuerto – hotel – aeropuerto.</li>
            <li>3 noches de alojamiento.</li>
            <li>Alimentación: desayunos por cada noche de alojamiento.</li>
            <li>City Tour histórico y cultural.</li>
            <li>Tour a Monserrate.</li>
            <li>Tour al parque Jaime Duque.</li>
            <li>Impuestos turísticos.</li>
            <li>Guía local.</li>
          </ul>

          <p class="fw-bold">No Incluye:</p>
          <ul>
            <li>Pasaje aéreo.</li>
            <li>Alimentación no detallada.</li>
            <li>Actividades adicionales fuera del hotel.</li>
            <li>
              Seguro de viaje**:
              <ul>
                <li>$22.00 solo médico.</li>
                <li>$50.00 por cobertura extra por COVID.</li>
                <li>$9.00 por cada $500.00 de cobertura de cancelación.</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </main>

    <?php include '../../views/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
