<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/LoginModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ILoginUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioNoAutenticadoException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Databases/Entities/UsuarioEntity.php";

class LoginRepository implements ILoginUsuario
{
    public function login(LoginModel $loginModel): UsuarioModel
    {
        try {
            $usuario = UsuarioEntity::find('first', array('conditions' => array('email = ?', $loginModel->getEmail())));
            if ($usuario && password_verify($loginModel->getPassword(), $usuario->password)) {
                return $usuario->mapperEntityToModel();
            } else {
                throw new UsuarioNoAutenticadoException("Credenciales incorrectas");
            }
        } catch (Exception $e) {
            throw new UsuarioNoAutenticadoException("Error de autenticación: " . $e->getMessage());
        }
    }
}
