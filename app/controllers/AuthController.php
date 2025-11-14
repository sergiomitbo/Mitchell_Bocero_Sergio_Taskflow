<?php
// app/controllers/AuthController.php
session_start();
function handleLogin($email, $password, $usuarios_bbdd)
{
    if (!isset($usuarios_bbdd[$email])) {
        echo "Usuario no encontrado: $email\n";
        return false;
    }

    if ($usuarios_bbdd[$email]['password'] === $password) {
        $_SESSION['user_id'] = $usuarios_bbdd[$email]['id'];
        $_SESSION['user_nombre'] = $usuarios_bbdd[$email]['nombre'];
        return true;
    } else {
        echo "Contraseña incorrecta para $email\n";
        var_dump($usuarios_bbdd[$email]['password']);
        var_dump($password);
        return false;
    }
}
function handleLogout()
{
    session_destroy();
    header('Location: index.php?accion=login');
    exit;
}
function checkAuth()
{
    return isset($_SESSION['user_id']);
}
?>