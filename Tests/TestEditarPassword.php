<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IBuscarUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/BuscarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/EditarPasswordService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IEditarPassword.php";

class TestEditarPassword
{
    public static function testEditarPassword()
    {
        // Arrange
        $email = 'andersonylian0@gmail.com';
        $newPassword = 'AndersonLuna.23';

        try {
            $usuarioRepository = new UsuarioRepository();
            $editarPasswordService = new EditarPasswordService($usuarioRepository);

            // Act
            $editarPasswordService->editarPassword($email, $newPassword);

            // Assert
            $usuario = $usuarioRepository->buscar($email);
            if (password_verify($newPassword, $usuario->getPassword())) {
                echo "La contraseña se ha actualizado correctamente.";
            } else {
                echo "La actualización de la contraseña ha fallado.";
            }
        } catch (Exception $e) {
            echo "Ha ocurrido un error inesperado: " . $e->getMessage();
        }
    }
}


TestEditarPassword::testEditarPassword();
