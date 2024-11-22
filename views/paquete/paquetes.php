<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Paquetes</title>
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
  <main class="mainContainer">
    <h2 class="mainContainer--title">Lista de Paquetes</h2>
    <div class="card-group p-5">
        <?php if (!empty($paquetes)): ?>
            <?php foreach ($paquetes as $paquete): ?>
                <div class="card m-3" style="width: 18rem;">
                    <?php if (!empty($paquete['Foto'])): ?>
                        <img src="<?php echo $paquete['Foto']; ?>" class="card-img-top" alt="Imagen del paquete">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $paquete['Nombre']; ?></h5>
                        <p class="card-text">
                            <strong>Destino:</strong> <?php echo $paquete['Destino']; ?><br>
                            <strong>Precio:</strong> $<?php echo $paquete['Precio']; ?><br>
                            <strong>Fechas:</strong> <?php echo $paquete['Fecha_inicio']; ?> - <?php echo $paquete['Fecha_final']; ?>
                        </p>
                        <p class="card-text"><?php echo $paquete['Descripcion']; ?></p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success">Ver itinerario</button>
                    </div>
                </div>
            <?php endforeach; ?>
      <?php else: ?>
        <p>No hay paquetes registrados.</p>
      <?php endif; ?>
    </div>
  </main>

</body>
</html>
