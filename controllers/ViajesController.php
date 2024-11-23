<?php
require_once '../models/Viajes.php';
require_once '../config/config.php';

class ViajesController {


    public function reservar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            verificarSesion();
            
            $userId = $_SESSION['usuario'];
            // Obtener los datos del formulario
            $id_usuario = $userId;
            $id_paquete = $_POST['id_paquete'] ?? null;
            $destino_salida = $_POST['destino_salida'];
            $destino_origen = $_POST['destino_origen'] ?? null;
            $estado = $_POST['estado'] ?? 'pendiente';
            $personas = $_POST['personas'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'] ?? null;
            $visa = $_POST['visa'] ?? null;
            $servicio = $_POST['servicio'];
            $tipo_autobus = $_POST['tipo_autobus'] ?? null;
            $tipo_habitacion = $_POST['tipo_habitacion'] ?? null;
            $clase_vuelo = $_POST['clase_vuelo'] ?? null;
            $clase_tren = $_POST['clase_tren'] ?? null;

            // Validar los datos (puedes agregar más validaciones)
            if (!empty($destino_salida) && !empty($estado) && !empty($personas) && !empty($fecha_inicio) && !empty($servicio)) {
                // Instanciar el modelo
                $viajesModel = new Viajes();

                // Llamar al método del modelo para crear el viaje
                $resultado = $viajesModel->crearViaje(
                    $id_usuario, $id_paquete, $destino_salida, $destino_origen, $estado, $personas, 
                    $fecha_inicio, $fecha_final, $visa, $servicio, $tipo_autobus, $tipo_habitacion, $clase_vuelo, $clase_tren
                );

                if ($resultado) {
                    // Redirigir al usuario a la lista de viajes o a la página de éxito
                    header('Location: ../config/routes.php?controller=viajes&action=verReservas');
                    exit();
                } else {
                    echo "Hubo un error al crear el viaje";
                }
            } else {
                echo "Por favor complete todos los campos obligatorios.";
            }
        }
    }

    public function verReservas() {
        session_start();
        if (isset($_SESSION['usuario'])) {

            $viajesModel = new Viajes();

            $userId = $_SESSION['usuario'];
            $reservas = $viajesModel->verReservas($userId);

            // Incluye la vista y pasa las reservas como parámetro
            require_once "../views/viajes/reservas.php";
        } else {
            // Redirigir al login si no está logueado
            header("Location: " . BASE_URL . "views/usuarios/login.php");
            exit;
        }
    }

    public function actualizarEstado()
    {
        if (isset($_POST['id_viajes'])) {
            $idViajes = $_POST['id_viajes'];

            $viajeModel = new Viajes();
            $resultado = $viajeModel->actualizarEstado($idViajes, "cancelado");

            if ($resultado) {
                // Redirige a la lista de viajes con un mensaje de éxito
                header('Location: ../config/routes.php?controller=viajes&action=verReservas');
                
            } else {
                // Redirige con un mensaje de error
                echo "ERROR";
            }
        }
    }
}

?>
