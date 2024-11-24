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
            // Recibir los datos del formulario
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $destino = $_POST['destino'];
            $precio = $_POST['precio'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'];
            $servicio = $_POST['servicio'];
            $itinerario = $_POST['itinerario'];

            // Leer la imagen como binario (blob)
            $foto = null;
            if (isset($_FILES['foto']['tmp_name']) && is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $foto = file_get_contents($_FILES['foto']['tmp_name']); // Leemos la imagen y la convertimos a binario
            }

            // Crear el array con los datos a insertar
            $datos = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'destino' => $destino,
                'precio' => $precio,
                'foto' => $foto, // La imagen ya convertida a binario (BLOB)
                'fecha_inicio' => $fecha_inicio,
                'fecha_final' => $fecha_final,
                'servicio' => $servicio,
                'itinerario' => $itinerario
            ];

            // Crear una instancia de la clase Paquete y llamar al método insertar
            $paquete = new Paquete();
            if ($paquete->insertar($datos)) {
                // Si la inserción fue exitosa, redirigir al dashboard
                header('Location: ../views/admin/dashboard.php');
            } else {
                // Si hubo un error, redirigir al dashboard también (puedes personalizarlo si lo deseas)
                header('Location: ../views/admin/dashboard.php');
            }
          }
        }


        public function verPaquete() {
            // Verificar que el id_paquete está presente en la URL
            if (isset($_GET['id_paquete'])) {
                $id_paquete = $_GET['id_paquete'];
            } else {
                echo "ID de paquete no proporcionado.";
                exit();
            }
    
            // Crear una instancia del modelo Paquete
            $paqueteModel = new Paquete();
    
            // Obtener la información del paquete
            $paquete = $paqueteModel->getPaqueteById($id_paquete);
    
            // Verificar si el paquete existe
            if ($paquete) {
                // Cargar la vista y pasarle los datos del paquete
                include '../views/paquete/paquete-desc.php';
            } else {
                echo "Paquete no encontrado.";
            }
        }
        
    }
?>
