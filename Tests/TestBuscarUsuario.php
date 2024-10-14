<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IBuscarUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/BuscarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioNoEncontradoException.php";

class TestUsuario
{
    public static function TestUsuarioBuscar()
    {
        // Arrange
        $email = 'Ander@example.com';

        try {
            $usuarioRepository = new UsuarioRepository();
            $buscarUsuarioService = new BuscarUsuarioService($usuarioRepository);
            $usuarioModel = $buscarUsuarioService->buscar($email);

            // Assert
            echo "Usuario encontrado: " . $usuarioModel->getNombre() . " " . $usuarioModel->getApellidos();
        } catch (UsuarioNoEncontradoException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


TestUsuario::TestUsuarioBuscar();
