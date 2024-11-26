<?php
require_once '../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_completo'];
    $documento = $_POST['documento'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña

    $user = new User();

    if ($user->register($nombre, $documento, $email, $fecha, $telefono, $contrasena)) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario. Verifique los datos.";
    }
} else {
    echo "Método no permitido. Este archivo solo acepta solicitudes POST.";
}
?>
