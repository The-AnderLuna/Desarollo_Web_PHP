<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/LoginModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IAuthService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/LoginRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/AuthService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioNoAutenticadoException.php";

session_start(); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $login = new LoginModel($email, $password);
        $loginRepository = new LoginRepository();
        $authService = new AuthService($loginRepository);
        $usuarioModel = $authService->login($login);

        
        $_SESSION['usuario_nombre'] = $usuarioModel->getNombre();
        $_SESSION['usuario_apellido'] = $usuarioModel->getApellidos();

   
        header("Location: /Proyecto_Web_PHP_/Views/Html/LoginForms/Welcome.php");
        exit();
    } catch (UsuarioNoAutenticadoException $e) {
      
        header("Location: /Proyecto_Web_PHP_/Views/Html/LoginForms/Login.php?error=incorrect_credentials");
        exit();
    } catch (Exception $e) {
      
        header("Location: /Proyecto_Web_PHP_/Views/Html/LoginForms/Login.php?error=unexpected_error");
        exit();
    }
}
