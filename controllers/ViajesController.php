<?php
require_once '../models/Viajes.php';
require_once '../config/config.php';

class ViajesController {
    private $viajes;

    public function __construct() {
        $this->viajes = new Viajes();
    }

    public function reservar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Capturar datos del formulario
            $estado = $_POST['estado'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'];
            $visa = $_POST['visa'];
            $id_usuario = $_POST['id_usuario'];
            $id_paquete = $_POST['id_paquete'];

            // Validar campos
            if (!empty($estado) && !empty($fecha_inicio) && !empty($fecha_final) && isset($visa) && !empty($id_usuario) && !empty($id_paquete)) {
                // Usar el modelo para insertar el viaje
                $resultado = $this->viajes->crearViaje($estado, $fecha_inicio, $fecha_final, $visa, $id_usuario, $id_paquete);

                if ($resultado) {
                    echo "Reserva realizada con éxito.";
                } else {
                    echo "Error al realizar la reserva.";
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    }

    public function listarViajes() {
        $viajes = $this->viajes->obtenerViajes();
        require_once '../views/viajes/listar.php';
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
}

?>
