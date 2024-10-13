<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IGuardarUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/GuardarUsuarioService.php";
class TestUsuario {
    public function TestUsuarioGuardarOError() {
        // Arrange
        $password = 'password1234';
        $nombre = 'Ander';
        $apellidos = 'Pérez';
        $rol = 'usuario';
        $email = 'juan.perez23@example.com';
        $telefono = '12345678902';
        $estado = 'activo';

        // Ajuste de la fecha para compatibilidad
        $fechaRegistro = new \DateTime(); // Utilizamos \DateTime para crear un objeto de fecha y hora

        $usuarioModel = new UsuarioModel(
            $password,
            $nombre,
            $apellidos,
            $rol,
            $email,
            $telefono,
            $estado,
            $fechaRegistro->format('Y-m-d H:i:s') // Formateamos la fecha a 'Y-m-d H:i:s'
        );

        $usuarioRepository = new UsuarioRepository();
        $guardarUsuarioService = new GuardarUsuarioService($usuarioRepository);

        // Act
        try {
            $total = $guardarUsuarioService->guardarUsuario($usuarioModel);
            // Assert
            echo "Total de Usuarios: $total";
        } catch (UsuarioEncontradoException $e) {
            // Aquí capturamos la excepción personalizada
            echo $e->getMessage();
        } catch (Exception $e) {
            // Captura de cualquier otra excepción
            echo $e->getMessage();
        }
    }
}

// Ejecutar el test
$test = new TestUsuario();
$test->TestUsuarioGuardarOError();
