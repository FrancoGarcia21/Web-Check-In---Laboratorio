<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "¡POST recibido correctamente!";
    print_r($_POST);
} else {
    echo "Solo se permiten solicitudes POST.";
}
?>
