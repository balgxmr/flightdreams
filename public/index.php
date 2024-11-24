<?php
  require_once '../models/Paquete.php';

  $paqueteModel = new Paquete();
  $paquetes = $paqueteModel->obtenerTresServiciosDiferentes();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flight Dreams</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Iconos: Font-Awesome -->
    <script src="https://kit.fontawesome.com/5ddbd215bf.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php include '../views/header.php'; ?>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-overlay">
        <h1>Bienvenido a FlightsDreams</h1>
        <p>Descubre destinos increíbles con nosotros.</p>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../public/images/aviones.webp" class="d-block w-100 h-30" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="../public/images/abuelos.jpg" class="d-block w-100 h-30" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="../public/images/crucero.jpeg" class="d-block w-100 h-30" alt="..." />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <section class="mainContainer">
      <h2 class="mainContainer--title">Nuestros servicios</h2>
      <h3 class="mainContainer--subtitle">Tenemos diversidad de servicios, ¡para lo que busques!</h3>

      <div class="d-flex gap-3 mt-5 mb-5">
        <div class="custom-card">
          <img class="" src="./images/vuelo-card.jpg" alt="">
          <div class="card-content">
            <h2>Vuelos</h2>
            <p>¿Buscas una nueva aventura?. ¡Aquí te tenemos los vuelos! ¡Lo que buscas está aqui!</p>
            <a href="#" class="button">Ver más</a>
          </div>
        </div>

        <div class="custom-card">
          <img class="" src="./images/autobus-card.jpg" alt="">
          <div class="card-content">
            <h2>Autobuses</h2>
            <p>Viaja comodamente en nuestro servicio de autobuses. Sientete seguro con nuestro sistema de viajes.</p>
            <a href="#" class="button">Ver más</a>
          </div>
        </div>

        <div class="custom-card">
          <img class="" src="./images/hotel-card.jpg" alt="">
          <div class="card-content">
            <h2>Hoteles</h2>
            <p>¿Buscando donde hospedarte? No dudes más, ¡te brindamos diversidades de lugares!</p>
            <a href="#" class="button">Ver más</a>
          </div>
        </div>

        <div class="custom-card">
          <img class="" src="./images/crucero-card.webp" alt="">
          <div class="card-content">
            <h2>Cruceros</h2>
            <p>Viaja por el mar, conociendo nuevos destinos. ¡Los cruceros te darán una nueva experiencia!</p>
            <a href="#" class="button">Ver más</a>
          </div>
        </div>

        <div class="custom-card">
          <img class="" src="./images/trenes.jpg" alt="">
          <div class="card-content">
            <h2>Trenes</h2>
            <p>Disfruta de lo mejor viajando en tren. Desde clases premium hasta económicas. ¡Lo que buscas está aqui!</p>
            <a href="#" class="button">Ver más</a>
          </div>
        </div>
      </div>
    </section>

      
    <section class="mainContainer">
      <h2 class="mainContainer--title">Descubre lugares impresionantes con nosotros</h2>
      <h3 class="mainContainer--subtitle">Asigna tu próximo viaje</h3>

      <?php if (!empty($paquetes)): ?>
        <div class="row">
            <?php 
            $count = 0; 
            foreach ($paquetes as $paquete): 
                // Calcular la duración entre las fechas
                $fechaInicio = new DateTime($paquete['Fecha_inicio']);
                $fechaFinal = new DateTime($paquete['Fecha_final']);
                $duracion = $fechaInicio->diff($fechaFinal)->days; // Diferencia en días
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if (!empty($paquete['Foto'])): ?>
                            <img class="card-img-top h-50" src="../public/images/canal-panama.jpg" alt="Imagen del paquete">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $paquete['Nombre']; ?></h5>
                            <p class="card-text"><?php echo $paquete['Descripcion']; ?></p>
                            <p class="card-text">
                                <strong>Destino:</strong> <?php echo $paquete['Destino']; ?><br>
                                <strong>Precio:</strong> $<?php echo number_format($paquete['Precio'], 2); ?><br>
                                <strong>Duración:</strong> <?php echo $duracion; ?> días<br>
                                <!-- <strong>Fechas:</strong> <?php echo $paquete['Fecha_inicio']; ?> - <?php echo $paquete['Fecha_final']; ?> -->
                                <strong>Servicio: <?php echo $paquete['servicio'];; ?></strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="paquete-desc.php"><button type="button" class="btn btn-success">Ver itinerario</button></a>
                        </div>
                    </div>
                </div>

                <?php 
                $count++;
                // Cierra la fila actual y abre una nueva después de 3 tarjetas
                if ($count % 3 == 0): 
                ?>
              </div><div class="row">
                <?php endif; ?>
            <?php endforeach; ?>
          </div>
      <?php else: ?>
          <p>No hay paquetes registrados.</p>
      <?php endif; ?>
    </main>

    <?php include '../views/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
