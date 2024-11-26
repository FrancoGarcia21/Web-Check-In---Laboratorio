<?php
require_once '../models/User.php';

$user = new User();
$result = $user->register('Tania Garcia', '22515303', 'tania@gmail.com', '1990-04-04', '5551234', 'contra1234');

if ($result) {
    echo "Registro exitoso.";
} else {
    echo "Error al registrar usuario.";
}
?>
