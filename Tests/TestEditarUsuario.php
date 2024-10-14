<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IBuscarUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/BuscarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioNoEncontradoException.php";

class TestEditarUsuario {
    public static function TestUsuarioEditar() {
        // Arrange
        $password = 'newpassword123';
        $nombre = 'Juana Editada';
        $apellidos = 'Gomez Editado';
        $rol = 'admin';
        $email = 'juana@example.com';
        $telefono = '9876543210';
        $estado = 'inactivo';
        $fechaRegistro = new \DateTime();

        try {
            $usuarioModel = new UsuarioModel(
                $password,
                $nombre,
                $apellidos,
                $rol,
                $email,
                $telefono,
                $estado,
                $fechaRegistro->format('Y-m-d H:i:s')
            );

            $usuarioRepository = new UsuarioRepository();
            $usuarioRepository->editar($usuarioModel);
            echo "Usuario editado correctamente.";
        } catch (UsuarioNoEncontradoException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage(); // Capturar cualquier otra excepción
        }
    }
}


TestEditarUsuario::TestUsuarioEditar();

