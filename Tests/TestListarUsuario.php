<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";

class TestUsuario
{
    public static function TestUsuarioListar()
    {
        try {
            $usuarioRepository = new UsuarioRepository();
            $usuarios = $usuarioRepository->listar();

            // Assert
            foreach ($usuarios as $usuario) {
                echo "Usuario: " . $usuario->getNombre() . " " . $usuario->getApellidos() . "\n";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

// Ejecutar el test
TestUsuario::TestUsuarioListar();
