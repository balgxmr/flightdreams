<?php
    // Incluye los controladores
    require_once '../controllers/UsuarioController.php';
    require_once '../controllers/PaqueteController.php';
    require_once '../controllers/ViajesController.php';

    // Obtiene el controlador y la acción de los parámetros de la URL
    $controller = isset($_GET['controller']) ? $_GET['controller'] : null;
    $action = isset($_GET['action']) ? $_GET['action'] : null;
    $servicio = $_GET['servicio'] ?? null;

    // Verifica y dirige a los métodos correspondientes en el controlador
    if ($controller == 'usuario') {
        $usuarioController = new UsuarioController();

        if ($action == 'registrar') {
            $usuarioController->registrar();
        } elseif ($action == 'loginUsuario') {
            $usuarioController->loginUsuario();
        } elseif ($action == 'loginAdministrador') {
            $usuarioController->loginAdministrador();
        } elseif($action == 'logout') {
            $usuarioController->logout();
        } elseif($action == 'actualizarUsuario') {
            $usuarioController->actualizarUsuario();
        } elseif($action == 'mostrarFormularioActualizar') {
            $usuarioController->mostrarFormularioActualizar();
            
        }
    } 

    if ($controller == 'paquete') {
        $paqueteController = new PaqueteController();
    
        if ($servicio) {
            if ($action == 'listarPorServicio') {
                $paqueteController->listarPorServicio($servicio);
            }
        } else {
            if ($action == 'listar') {
                $paqueteController->listar();
            }
        }
    }

    if ($controller == 'viajes') {
        $paqueteController = new ViajesController();
    
        if ($action == 'verReservas') {
            $paqueteController->verReservas();
        } elseif($action == 'reservar') {
            $paqueteController->reservar();
        } elseif($action == 'actualizarEstado') {
            $paqueteController->actualizarEstado();
        } 
    }
?>
