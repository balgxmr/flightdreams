<form method="POST" action="../../config/routes.php?controller=viajes&action=reservar">
    <label for="estado">Estado:</label>
    <input type="text" id="estado" name="estado" required>

    <label for="fecha_inicio">Fecha Inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" required>

    <label for="fecha_final">Fecha Final:</label>
    <input type="date" id="fecha_final" name="fecha_final" required>

    <label for="visa">Visa requerida:</label>
    <select id="visa" name="visa" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label for="id_usuario">ID Usuario:</label>
    <input type="number" id="id_usuario" name="id_usuario" required>

    <label for="id_paquete">ID Paquete:</label>
    <input type="number" id="id_paquete" name="id_paquete" required>

    <button type="submit">Reservar</button>
</form>
