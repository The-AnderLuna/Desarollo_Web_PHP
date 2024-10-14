<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/GuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioEncontradoException.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $rol = $_POST['rol'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar longitud de la contraseña
    if (strlen($password) < 12) {
        // Redirigir a la página de registro con mensaje de error
        header('Location: ../../views/html/register.php?message=password_length');
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hashear la contraseña
    $telefono = $_POST['telefono'];
    $estado = 'activo';
    $fechaRegistro = new \DateTime();

    try {
        $usuarioModel = new UsuarioModel(
            $hashedPassword,
            $nombre,
            $apellidos,
            $rol,
            $email,
            $telefono,
            $estado,
            $fechaRegistro->format('Y-m-d H:i:s')
        );

        // Validar el modelo
        $errores = $usuarioModel->validar();
        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo "$error\n";
            }
            return;
        }

        $usuarioRepository = new UsuarioRepository();
        $guardarUsuarioService = new GuardarUsuarioService($usuarioRepository);

        // Guardar usuario
        $guardarUsuarioService->guardarUsuario($usuarioModel);
        // Redirigir a la página de inicio de sesión con mensaje de éxito
        header('Location: ../../views/html/login.php?message=success');
        exit();
    } catch (UsuarioEncontradoException $e) {
        // Redirigir a la página de registro con mensaje de error
        header('Location: ../../views/html/register.php?message=exists');
        exit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
