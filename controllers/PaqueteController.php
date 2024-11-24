<?php
    require_once '../models/Paquete.php';
    require_once '../config/config.php';

    class PaqueteController {

        public function listar() {
            $paqueteModel = new Paquete();
            $paquetes = $paqueteModel->obtenerTodos();

            // Incluye la vista para mostrar los paquetes
            require_once '../views/paquete/paquetes.php';
        }
    
        public function listarPorServicio($servicio) {
            $paqueteModel = new Paquete();
            $paquetes = $paqueteModel->obtenerPorServicio($servicio);

            require_once '../views/servicios/' . $servicio . '.php';
        }

        public function listarPorServicioPaquetes($servicio) {
            $paqueteModel = new Paquete();
            $paquetes = $paqueteModel->obtenerPorServicio($servicio);

            require_once '../views/paquete/paquetes.php';
        }

        public function registrar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $destino = $_POST['destino'];
                $precio = $_POST['precio'];
                $fecha_inicio = $_POST['fecha_inicio'];
                $fecha_final = $_POST['fecha_final'];
                $servicio = $_POST['servicio'];
                $itinerario = $_POST['itinerario'];
        
                // Leer imagen como binario
                $foto = null;
                if (isset($_FILES['foto']['tmp_name']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
                    $foto = file_get_contents($_FILES['foto']['tmp_name']);
                }
        
                $datos = [
                    'nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'destino' => $destino,
                    'precio' => $precio,
                    'foto' => $foto,
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_final' => $fecha_final,
                    'servicio' => $servicio,
                    'itinerario' => $itinerario
                ];
        
                $paquete = new Paquete();
                if ($paquete->insertar($datos)) {
                    header('Location: ../views/admin/dashboard.php');
                } else {
                    header('Location: ../views/admin/dashboard.php');
                }
            }
        }
        
        
    }
?>
