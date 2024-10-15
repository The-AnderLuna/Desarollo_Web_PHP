<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IGuardarUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/GuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioEncontradoException.php";
class TestUsuario
{
    public static function TestUsuarioGuardarOError()
    {
        // Arrange
        $password = '123456789000';
        $nombre = 'juana';
        $apellidos = 'gomez';
        $rol = 'usuario';
        $email = 'juana@example.com';
        $telefono = '3033456363';
        $estado = 'activo';
        $fechaRegistro = new \DateTime(); // Fecha actual

        $usuarioModel = new UsuarioModel(
            $password,
            $nombre,
            $apellidos,
            $rol,
            $email,
            $telefono,
            $estado,
            $fechaRegistro->format('Y-m-d H:i:s') // Formato de fecha
        );
        
    
         $errores = $usuarioModel->validar();
         if (!empty($errores)) {
             foreach ($errores as $error) {
                 echo "$error\n"; 
             }
             return; 
         }
 

        $usuarioRepository = new UsuarioRepository();
        $guardarUsuarioService = new GuardarUsuarioService($usuarioRepository);

        // Act
        try {
            $total = $guardarUsuarioService->guardarUsuario($usuarioModel);
            echo "Total de Usuarios: $total";
        } catch (UsuarioEncontradoException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
              echo $e->getMessage();
        }
}
}

// Ejecutar el test
TestUsuario::TestUsuarioGuardarOError();