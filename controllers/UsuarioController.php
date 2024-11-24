<?php
require_once '../models/Usuario.php';
require_once '../config/config.php';

class UsuarioController {

    // Acción para mostrar el formulario de registro
    public function mostrarFormularioRegistro() {
        require_once '../views/usuarios/registrar.php';
    }

    // Acción para registrar un nuevo usuario
    public function registrar() {
        // Verificamos si el formulario ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recibimos los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $nacionalidad = $_POST['nacionalidad'];
            $residencia = $_POST['residencia'];
            $telefono = $_POST['telefono'];

            // Validamos los datos (aquí puedes agregar más validaciones)
            if (!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($contrasena) && !empty($nacionalidad) && !empty($residencia) && !empty($telefono)) {
                // Creamos una instancia del modelo Usuario
                $usuarioModel = new Usuario();

                // Llamamos a la función para registrar el usuario
                $resultado = $usuarioModel->registrar($nombre, $apellido, $correo, $contrasena, $nacionalidad, $residencia, $telefono);
                

                // Verificamos si el registro fue exitoso
                if ($resultado) {
                    $usuario = $usuarioModel->obtenerPorCorreo($correo);
                    session_start();
                    $_SESSION['usuario'] = $usuario['id_usuario'];
                    // Redirigir al usuario a la página de inicio o login (puedes personalizar esto)
                    header('Location: ../public/index.php'); 
                } else {
                    // Si hubo un error al registrar el usuario
                    echo "Error al registrar el usuario";
                }
            } else {
                echo "Todos los campos son obligatorios";
            }
        }
    }

    public function loginUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
    
            if (!empty($correo) && !empty($contrasena)) {
                $usuarioModel = new Usuario();
                $usuario = $usuarioModel->obtenerPorCorreo($correo);
    
                if ($usuario && password_verify($contrasena, $usuario['Contrasena'])) {
                    // Inicia sesión y redirige
                    session_start();
                    $_SESSION['usuario'] = $usuario['id_usuario'];
                    header('Location: ../public/index.php');
                    exit();
                } else {
                    // Establece una cookie con el mensaje de error
                    setcookie('error_login', 'Correo o contraseña incorrectos.', time() + 360, '/'); 
                    header('Location: ../views/usuarios/login.php');
                    exit();
                }
            } else {
                // Establece una cookie si faltan campos
                setcookie('error_login', 'Todos los campos son obligatorios.', time() + 360, '/');
                header('Location: ../views/usuarios/login.php');
                exit();
            }
        } else {
            // Si no es un POST, simplemente carga la vista de login
            require_once '../views/usuarios/login.php';
        }
    }

    public function loginAdministrador() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombreUsuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];
    
            if (!empty($nombreUsuario) && !empty($contrasena)) {
                $usuarioModel = new Usuario();
                $administrador = $usuarioModel->obtenerPorNombreUsuario($nombreUsuario);
    
                if ($administrador && hash('sha256', $contrasena) === $administrador['contrasena']) {
                    // Inicia sesión y redirige
                    session_start();
                    $_SESSION['admin'] = $administrador['id_admin'];
                    header('Location: ../views/admin/dashboard.php');
                    exit();
                } else {
                    // Establece una cookie con el mensaje de error
                    setcookie('error_login_admin', 'Usuario o contraseña incorrectos.', time() + 3600, '/'); // Expira en 1 hora
                    header('Location: ../views/usuarios/login-admin.php');
                    exit();
                }
            } else {
                // Establece una cookie si faltan campos
                setcookie('error_login_admin', 'Todos los campos son obligatorios.', time() + 3600, '/'); // Expira en 1 hora
                header('Location: ../views/usuarios/login-admin.php');
                exit();
            }
        } else {
            // Si no es un POST, simplemente carga la vista de login de administrador
            require_once '../views/usuarios/login-admin.php';
        }
    }
    

    public function logout() {
        session_start(); // Inicia la sesión si no está iniciada
        session_unset(); // Limpia las variables de sesión
        session_destroy(); // Destruye la sesión activa
        
        // Redirige al usuario a la página de login
        header("Location: " . BASE_URL . "public/index.php");
        exit;
        
    }

    public function mostrarFormularioActualizar()
    {
        session_start();

        verificarSesion();

        // Obtener ID del usuario de la sesión
        $id = $_SESSION['usuario'];

        // Obtener datos del usuario
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->obtenerUsuarioPorId($id);

        // Cargar la vista y pasarle los datos del usuario
        require_once '../views/usuarios/actualizar-usuario.php';
    }

    public function actualizarUsuario()
    {
        session_start();

        verificarSesion();

        $id = $_SESSION['usuario'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $nacionalidad = $_POST['nacionalidad'];
            $residencia = $_POST['residencia'];
            $telefono = $_POST['telefono'];

            $id = $_SESSION['usuario'];

            // Obtener datos del usuario
            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->obtenerUsuarioPorId($id);

            if (!empty($contrasena)) {
                // Si hay una nueva contraseña, generamos un nuevo hash
                $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
            } else {
                // Si no se cambió la contraseña, mantenemos el valor actual
                // Asegúrate de obtener la contraseña actual del usuario en este caso
                $contrasena = $usuario['Contrasena']; // Aquí asumes que la contraseña actual es la que se mantiene si no se cambia
            }

            $resultado = $usuarioModel->actualizarUsuario(
                $id,
                $nombre,
                $apellido,
                $correo,
                $contrasena,
                $nacionalidad,
                $residencia,
                $telefono
            );

            if ($resultado) {
                // Redirigir con éxito
                header('Location: ../public/index.php');
            } else {
                // Mostrar error
                echo "Error al actualizar usuario.";
            }
        }
    }
}
?>


