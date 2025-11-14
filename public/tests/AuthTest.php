<?php
// tests/AuthTest.php
use PHPUnit\Framework\TestCase;

// Rutas absolutas relativas al archivo actual
require_once __DIR__ . '/../../app/data.php';
require_once __DIR__ . '/../../app/controllers/AuthController.php';

class AuthTest extends TestCase
{
    // Prueba para el "camino feliz" (login correcto)
    public function testLoginConCredencialesValidas()
    {

        $usuarios_bbdd = [
            'usuario1@taskflow.com' => [
                'id' => 1,
                'nombre' => 'Sergio Mitchell',
                'password' => '1234' // Simulación de contraseña (sin hashear, por ahora)
            ],
            'usuario2@taskflow.com' => [
                'id' => 2,
                'nombre' => 'Javi Saravia',
                'password' => '1234'
            ]
        ];

        global $usuarios_bbdd;

        // Actuar: llamamos a la función con usuario válido
        $resultado = handleLogin('usuario1@taskflow.com', '1234', $usuarios_bbdd);

        // Aserción: Afirmamos que el resultado debe ser verdadero
        $this->assertTrue($resultado);
    }

    // Prueba para el "camino triste" (login incorrecto)
    public function testLoginConCredencialesInvalidas()
    {
        $usuarios_bbdd = [
            'usuario1@taskflow.com' => [
                'id' => 1,
                'nombre' => 'Sergio Jimenez',
                'password' => '1234' // Simulación de contraseña (sin hashear, por ahora)
            ],
            'usuario2@taskflow.com' => [
                'id' => 2,
                'nombre' => 'Abel Gamez',
                'password' => '1234'
            ]
        ];

        global $usuarios_bbdd;

        // Actuar: llamamos a la función con contraseña errónea
        $resultado = handleLogin('usuario1@taskflow.com', 'pass_erroneo', $usuarios_bbdd);

        // Aserción: Afirmamos que el resultado debe ser falso
        $this->assertFalse($resultado);
    }
}
?>