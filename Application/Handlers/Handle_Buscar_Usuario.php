<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IBuscarUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/BuscarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioNoEncontradoException.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    try {
        $usuarioRepository = new UsuarioRepository();
        $buscarUsuarioService = new BuscarUsuarioService($usuarioRepository);
        $usuarioModel = $buscarUsuarioService->buscar($email);

        // Redirigir con el resultado del usuario encontrado
        header("Location: /Proyecto_Web_PHP_/Views/Html/UsuarioForms/buscar_usuario.php?message=Usuario+encontrado:+{$usuarioModel->getNombre()}+{$usuarioModel->getApellidos()}");
        exit();
    } catch (UsuarioNoEncontradoException $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/UsuarioForms/buscar_usuario.php?message=Usuario+no+encontrado");
        exit();
    } catch (Exception $e) {
        echo "Error inesperado: " . $e->getMessage();
    }
}
