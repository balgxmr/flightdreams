<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar Perfil</title>
    <!-- CSS y Bootstrap -->
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5ddbd215bf.js" crossorigin="anonymous"></script>
</head>
<body class="login-body">
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <svg xmlns="http://www.w3.org/2000/svg" height="240px" viewBox="0 -960 960 960" width="240px" fill="#434343">
                    <path d="M222-255q63-44 125-67.5T480-346q71 0 133.5 23.5T739-255q44-54 62.5-109T820-480q0-145-97.5-242.5T480-820q-145 0-242.5 97.5T140-480q0 61 19 116t63 109Zm257.81-195q-57.81 0-97.31-39.69-39.5-39.68-39.5-97.5 0-57.81 39.69-97.31 39.68-39.5 97.5-39.5 57.81 0 97.31 39.69 39.5 39.68 39.5 97.5 0 57.81-39.69 97.31-39.68 39.5-97.5 39.5Zm.66 370Q398-80 325-111.5t-127.5-86q-54.5-54.5-86-127.27Q80-397.53 80-480.27 80-563 111.5-635.5q31.5-72.5 86-127t127.27-86q72.76-31.5 155.5-31.5 82.73 0 155.23 31.5 72.5 31.5 127 86t86 127.03q31.5 72.53 31.5 155T848.5-325q-31.5 73-86 127.5t-127.03 86Q562.94-80 480.47-80Zm-.47-60q55 0 107.5-16T691-212q-51-36-104-55t-107-19q-54 0-107 19t-104 55q51 40 103.5 56T480-140Zm0-370q34 0 55.5-21.5T557-587q0-34-21.5-55.5T480-664q-34 0-55.5 21.5T403-587q0 34 21.5 55.5T480-510Zm0-77Zm0 374Z"/>
                </svg>
                <h2 class="text-center mt-4"><?php echo htmlspecialchars($datosUsuario['Nombre']) . " " . htmlspecialchars($datosUsuario['Apellido']); ?></h2>
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="../../config/routes.php?controller=usuario&action=actualizarUsuario">
                    <div>
                        <h3 class="row d-flex justify-content-center align-items-center p-3">Actualizar Perfil</h3>
                        <hr class="p-3" />
                    </div>

                    <!-- Nombre -->
                    <div class="form-outline mb-3">
                        <input type="text" name="Nombre" class="form-control form-control-lg" value="<?php echo htmlspecialchars($datosUsuario['Nombre']); ?>" />
                        <label class="form-label pt-2">Nombre</label>
                    </div>

                    <!-- Apellido -->
                    <div class="form-outline mb-3">
                        <input type="text" name="Apellido" class="form-control form-control-lg" value="<?php echo htmlspecialchars($datosUsuario['Apellido']); ?>" />
                        <label class="form-label pt-2">Apellido</label>
                    </div>

                    <!-- Nacionalidad -->
                    <div class="form-outline mb-3">
                        <input type="text" name="Nacionalidad" class="form-control form-control-lg" value="<?php echo htmlspecialchars($datosUsuario['Nacionalidad']); ?>" />
                        <label class="form-label pt-2">Nacionalidad</label>
                    </div>

                    <!-- Correo -->
                    <div class="form-outline mb-3">
                        <input type="email" name="Correo" class="form-control form-control-lg" value="<?php echo htmlspecialchars($datosUsuario['Correo']); ?>" />
                        <label class="form-label pt-2">Correo</label>
                    </div>

                    <!-- Residencia -->
                    <div class="form-outline mb-3">
                        <input type="text" name="Residencia" class="form-control form-control-lg" value="<?php echo htmlspecialchars($datosUsuario['Residencia']); ?>" />
                        <label class="form-label pt-2">Residencia</label>
                    </div>

                    <!-- Teléfono -->
                    <div class="form-outline mb-3">
                        <input type="text" name="Telefono" class="form-control form-control-lg" value="<?php echo htmlspecialchars($datosUsuario['Telefono']); ?>" />
                        <label class="form-label pt-2">Teléfono</label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
