<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cotiza tu Destino</title>
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
  </head>
  <body>
    <?php include '../header.php'?>

    <section id="carouselExample" class="carousel slide">
      <div class="carousel-overlay">
        <h1>¡Elige tu destino y cotiza!</h1>
        <!-- <p>Descubre destinos increíbles con nosotros.</p> -->
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../../public/images/aviones.webp" class="d-block w-100 h-30 imagenCotizar" alt="..." />
        </div>
      </div>
    </section>

    <section class="mainContainer formsContainer">
      <div class="container py-3">
        <div class="bg-primary text-white p-3 mb-3">
          <h5 class="m-0">Información del viaje en Crucero</h5>
        </div>
        <form>
          
          <div class="row g-3 mb-3">
            <!-- Destino -->
            <div class="col-md-4">
              <label for="destino" class="form-label">¿Desde donde ir?</label>
              <select id="destino" class="form-select">
                <option selected>Seleccionar...</option>
                <option>Panamá, San Lorenzo</option>
                <option>Americada</option>
                <option>Asia</option>
              </select>
            </div>
            
            <!-- Destino -->
            <div class="col-md-4">
              <label for="destino" class="form-label">¿A donde ir?</label>
              <select id="destino" class="form-select">
                <option selected>Seleccionar...</option>
                <option>Caribe</option>
                <option>Europa</option>
                <option>Asia</option>
              </select>
            </div>
            
            <!-- Personas -->
            <div class="col-md-4">
              <label for="personas" class="form-label">Personas</label>
              <input type="number" id="personas" class="form-control" min="1" max="20" placeholder="Cantidad de personas" />
            </div>
          </div>
          
          <div class="row g-3 mb-3">
            <!-- Fecha inicial -->
            <div class="col-md-4">
              <label for="fechaInicio" class="form-label">Fecha Inicial</label>
              <input type="date" id="fechaInicio" class="form-control" />
            </div>
            <!-- Fecha final -->
            <div class="col-md-4">
              <label for="fechaFinal" class="form-label">Fecha Final</label>
              <input type="date" id="fechaFinal" class="form-control" />
            </div>

            <!-- Visa -->
            <div class="col-md-4">
              <label class="form-label text-center d-block">Visa</label>
              <div class="d-flex align-items-center justify-content-center align-bottom">
                <div class="form-check me-3">
                  <input class="form-check-input" type="radio" id="visa-requerida" name="visa" value="requerida" />
                  <label class="form-check-label" for="visa-requerida">Requerida</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="visa-no-requerida" name="visa" value="no_requerida" />
                  <label class="form-check-label" for="visa-no-requerida">No Requerida</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-3 mb-3">
            
          </div>


          
          <div class="d-flex justify-content-between align-items-center">
            <span class="fs-5 fw-bold text-primary">Por favor, rellena todos los campos</span>
            <div>
              <button type="submit" class="btn btn-success me-2">Registrar</button>
              <button type="reset" class="btn btn-outline-secondary">Limpiar</button>
            </div>
          </div>
        </form>
      </div>
    </section>

    <section class="mainContainer">
        <h2 class="mainContainer--title">¿Sin ideas a donde ir?</h2>
        <h3 class="mainContainer--subtitle">Te recomendamos viajes:</h3>

        <div class="card-group p-5">
          <div class="card">
            <img src="../../public/images/barcelona.jpg" class="card-img-top h-50" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-success">Cotizar</button>
            </div>
          </div>
          <div class="card">
            <img src="../../public/images/toronto.jpg" class="card-img-top h-50" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-success">Cotizar</button>
            </div>
          </div>
          
          <div class="card">
            <img src="../../public/images/barcelona.jpg" class="card-img-top h-50" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
              <a href="./paquete.php">
                <button type="button" class="btn btn-success">Cotizar</button>
              </a>
            </div>
          </div>

          <div class="card">
            <img src="../../public/images/barcelona.jpg" class="card-img-top h-50" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-success">Cotizar</button>
            </div>
          </div>

          <div class="card">
            <img src="../../public/images/barcelona.jpg" class="card-img-top h-50" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-success">Cotizar</button>
            </div>
          </div>
        </div>
      </section>


    <?php include '../footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
