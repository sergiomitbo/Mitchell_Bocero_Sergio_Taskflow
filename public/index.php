<?php
// public/index.php
// 1. Cargar todas nuestras herramientas
require_once '../app/functions.php'; // Funciones de la PE3
require_once '../app/data.php'; // Nuestro "Modelo" de datos
require_once '../app/controllers/AuthController.php'; // Nuestro "Controlador" de autenticación
// 2. Lógica del Router (Controlador Frontal)
$accion = $_GET['accion'] ?? 'login'; // Acción por defecto: 'login'
switch ($accion) {
case 'login':
// Lógica para procesar el envío del formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = $_POST['email'];
$password = $_POST['password'];
if (handleLogin($email, $password, $usuarios_bbdd)) {
header('Location: index.php?accion=dashboard'); // Redirige al dashboard
exit;
} else {
$error = "Credenciales incorrectas."; // Variable para la vista
}
}
// Si no es POST o el login falla, muestra la vista de login
include '../app/views/login.view.php';
break;
case 'dashboard':
// Protección de la ruta (Tema 5)
if (!checkAuth()) {

    header('Location: index.php?accion=login');
exit;
}
// Si estamos autenticados, preparamos los datos para la vista
$tareas = [
['titulo' => 'Implementar Login', 'completado' => true,
'prioridad' => 'alta'],
['titulo' => 'Añadir Pruebas Unitarias', 'completado' => false,
'prioridad' => 'media']
];
// Cargamos la vista del dashboard
include '../app/views/tareas.view.php';
break;
case 'logout':
handleLogout();
break;
default:
echo "Error 404: Página no encontrada.";
break;
}
?>