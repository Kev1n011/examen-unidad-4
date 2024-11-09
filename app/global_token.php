<?php
session_start();

function generar_token($lenght = 10)
{
    $cadena = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $token = '';
    for ($i = 0; $i < $lenght; $i++) {
        $token .= $cadena[rand(0, 35)];
    }
    return $token;
}

if (!isset($_SESSION['global_token'])) {
    $_SESSION['global_token'] = generar_token(10);
}
?>