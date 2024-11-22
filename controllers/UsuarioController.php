<?php
require_once '../models/Usuario.php';
require_once '../config/config.php';

class UsuarioController {

    // Acción para mostrar el formulario de registro
    public function mostrarFormulario() {
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

     // Acción para loguear a un usuario
    public function loginUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            if (!empty($correo) && !empty($contrasena)) {
                $usuarioModel = new Usuario();
                $usuario = $usuarioModel->obtenerPorCorreo($correo);

                if ($usuario && password_verify($contrasena, $usuario['Contrasena'])) {
                    // Inicia sesión o redirige
                    session_start();
                    $_SESSION['usuario'] = $usuario['id_usuario'];
                    header('Location: ../public/index.php');
                } else {
                    echo "Correo o contraseña incorrectos.";
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        } else {
            require_once '../views/usuarios/login.php';
        }
    }

    // Acción para loguear a un administrador
    public function loginAdministrador() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombreUsuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];

            if (!empty($nombreUsuario) && !empty($contrasena)) {
                $usuarioModel = new Usuario();
                $administrador = $usuarioModel->obtenerPorNombreUsuario($nombreUsuario);

                if ($administrador && password_verify($contrasena, $administrador['contrasena'])) {
                    // Inicia sesión o redirige
                    session_start();
                    $_SESSION['admin'] = $administrador;
                    header('Location: ../public/index.php');
                } else {
                    echo "Usuario o contraseña incorrectos.";
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        } else {
            require_once '../views/admin/login.php';
        }
    }

    public function logout() {
        session_start(); // Inicia la sesión si no está iniciada
        session_unset(); // Limpia las variables de sesión
        session_destroy(); // Destruye la sesión activa
        
        // Redirige al usuario a la página de login
        header("Location: " . BASE_URL . "views/usuarios/login.php");
        exit;
        
    }

    public function editarPerfil() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $userId = $_SESSION['usuario'];
            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->obtenerUsuarioPorId($userId);

            require_once __DIR__ . '/../views/usuarios/editarPerfil.php';
        } else {
            header("Location: " . BASE_URL . "views/usuarios/login.php");
            exit;
        }
    }

    public function actualizarPerfil() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $userId = $_SESSION['usuario'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];

            $usuarioModel = new Usuario();
            $actualizado = $usuarioModel->actualizarUsuario($userId, $nombre, $email, $telefono);

            if ($actualizado) {
                $_SESSION['success_message'] = "Datos actualizados correctamente.";
            } else {
                $_SESSION['error_message'] = "Error al actualizar los datos.";
            }
            header("Location: " . BASE_URL . "?controller=usuario&action=editarPerfil");
            exit;
        } else {
            header("Location: " . BASE_URL . "views/usuarios/login.php");
            exit;
        }
    }
}
?>


