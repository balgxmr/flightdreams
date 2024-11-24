<?php
    // Incluye los controladores
    require_once '../controllers/UsuarioController.php';
    require_once '../controllers/PaqueteController.php';
    require_once '../controllers/ViajesController.php';
    require_once '../controllers/AdminController.php';

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
    

        if($action == 'listarPorServicioPaquetes'){
            $paqueteController->listarPorServicioPaquetes($servicio);
        } elseif($action == 'registrar'){
            $paqueteController->registrar();
        }

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
        $viajesController = new ViajesController();
    
        if ($action == 'verReservas') {
            $viajesController->verReservas();
        } elseif($action == 'reservar') {
            $viajesController->reservar();
        } elseif($action == 'actualizarEstado') {
            $viajesController->actualizarEstado();
        } elseif($action == 'verReservasLogica') {
            $viajesController->verReservasLogica();
        }
    }

    if ($controller == 'admin') {
        $adminController = new AdminController();
    
        if ($action == 'verReservasAdmin') {
            $adminController->verReservasAdmin();
        } elseif($action == 'actualizarEstado'){
            $adminController->actualizarEstado();
        } 
        
        if ($servicio) {
            if ($action == 'listarPorServicioAdmin') {
                $adminController->listarPorServicioAdmin($servicio);
            }
        } else {
            if ($action == 'listarAdmin') {
                $adminController->listarAdmin();
            }
        }
        
    }

?>
