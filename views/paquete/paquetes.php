<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Paquetes</title>
    
</head>
<body>
    <h1>Lista de Paquetes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($paquetes)): ?>
                <?php foreach ($paquetes as $paquete): ?>
                    <tr>
                        <td><?php echo $paquete['id_paquete']; ?></td>
                        <td><?php echo $paquete['Nombre']; ?></td>
                        <td><?php echo $paquete['Descripcion']; ?></td>
                        <td><?php echo $paquete['Destino']; ?></td>
                        <td><?php echo $paquete['Precio']; ?></td>
                        <td><?php echo $paquete['Foto']; ?></td>
                        <td><?php echo $paquete['Fecha_inicio']; ?></td>
                        <td><?php echo $paquete['Fecha_final']; ?></td>
                        <td><?php echo $paquete['itinerario']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay paquetes registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
