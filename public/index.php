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
          <img src="https://static.euronews.com/articles/stories/08/69/95/16/1440x810_cmsv2_59d41854-f375-5160-837c-6e16c649690b-8699516.jpg" alt="Plane"  class="d-block w-100 h-30" />
        </div>
        <div class="carousel-item">
          <img src="https://s3.eu-west-1.amazonaws.com/mundy.assets.d3r.com/images/hero_large/76045-best-cruises-groups-family-friends-seabourn.jpeg" class="d-block w-100 h-30" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="https://bostonglobe-prod.cdn.arcpublishing.com/resizer/v2/NVP4VSMGZ5RJKHAKLCJT5HXVCY.jpg?auth=97178dab0fad114204e6ad387a7d87fdaa4df37114f6f2a494c760d42a9706fd&width=1440" class="d-block w-100 h-30" alt="..." />
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
        <div class="row mt-5">
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
    </section>

    <hr>

    <section class="mainContainer services">
        <p class="h3">Nuestros afiliados: </p>
        <div class="services-container-img">
          <img src="https://aeroinforme.com/wp-content/uploads/2022/01/R-1-768x403.png" alt="">
          <img src="https://blog.edutin.com/wp-content/uploads/2024/09/bnb_billboard_01-2000x1125-1-1.jpg" alt="">
          <img src="https://infoturlatam.com/wp-content/uploads/2022/08/tripadvisor-viajes.png" alt="">
          <img src="https://content.presspage.com/clients/o_685.jpg" alt="">
          <img src="https://1000marcas.net/wp-content/uploads/2020/02/Hilton-Emblema.jpg" alt="">
          <img src="https://logos-world.net/wp-content/uploads/2021/03/Hyatt-Hotels-Emblem.png" alt="">
          <img src="https://i0.wp.com/www.embracethejourneytravel.com/wp-content/uploads/2018/02/norwegian-cruise-line-logo.jpg?fit=300%2C300&ssl=1" alt="">
        </div>
    </section>

    <?php include '../views/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
