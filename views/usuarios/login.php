<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar sesión</title>
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
  <body class="login-body">
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <!-- <img src="https://t3.ftcdn.net/jpg/05/27/24/36/360_F_527243669_mhBh7M6Xb9hxg0y2Ug87XfQrlX20suMU.jpg" class="img-fluid" alt="Sample image" /> -->
            <img class="img-fluid" src="./assets/img/Flight-&-Dreams-LOGO-Traz.png" alt="" />
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="../../config/routes.php?controller=usuario&action=loginUsuario">
              <div>
                <i class="fa-solid fa-user fa-2x row d-flex justify-content-center align-items-center"></i>
                <h1 class="row d-flex justify-content-center align-items-center p-3">Inicia sesión</h1>
                <hr class="p-3" />
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="" name="correo" class="form-control form-control-lg" placeholder="Ingresa un correo electrónico válido" />
                <label class="form-label pt-2" for="form3Example3">Correo electrónico</label>
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-3">
                <input type="password" id="" name="contrasena" class="form-control form-control-lg" placeholder="Introduce la contraseña" />
                <label class="form-label pt-2" for="form3Example4">Contraseña</label>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0"></div>
                <a href="./login-admin.php" class="text-body">Iniciar sesión como admin</a>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">

                  <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">Iniciar sesión</button>

                <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes una cuenta? <a href="./registrar.php" class="link-danger">Registrate</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
