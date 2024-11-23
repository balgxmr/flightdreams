<?php
define('BASE_URL', '/FlightsAndDreams/');

function verificarSesion() {
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . 'views/usuarios/login.php'); 
        exit();
    }
}
?>
