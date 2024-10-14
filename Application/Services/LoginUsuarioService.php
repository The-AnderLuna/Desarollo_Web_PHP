<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ILoginUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/LoginModel.php";

class LoginUsuarioService implements ILoginUsuario
{
    private $loginRepository;

    public function __construct(ILoginUsuario $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function login(LoginModel $loginModel): UsuarioModel
    {
        return $this->loginRepository->login($loginModel);
    }
}
