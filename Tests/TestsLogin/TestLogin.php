<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/LoginModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IAuthService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/LoginRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/AuthService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioNoAutenticadoException.php";

class TestLogin
{
    public static function TestIniciarSesion()
    {
        // Arrange
        $email = 'andersonylian0@gmail.com';
        $password = 'AndersonLuna.23';

        try {
            $login = new LoginModel($email, $password);
            $loginRepository = new LoginRepository();
            $authService = new AuthService($loginRepository);
            $usuarioModel = $authService->login($login);

            // Assert
            echo "Inicio de sesión exitoso. Bienvenido, " . $usuarioModel->getNombre();
        } catch (UsuarioNoAutenticadoException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage(); 
        }
    }
}

// Ejecutar el test
TestLogin::TestIniciarSesion();
