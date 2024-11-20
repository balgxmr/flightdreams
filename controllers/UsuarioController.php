<?php
require_once '../models/Usuario.php';

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
                    // Redirigir al usuario a la página de inicio o login (puedes personalizar esto)
                    header('Location: login.html'); 
                } else {
                    // Si hubo un error al registrar el usuario
                    echo "Error al registrar el usuario";
                }
            } else {
                echo "Todos los campos son obligatorios";
            }
        }
    }
}
?>


