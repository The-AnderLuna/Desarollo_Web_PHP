<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ILoginUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IAuthService.php";

class AuthService implements IAuthService
{
    private $usuarioRepository;

    public function __construct(ILoginUsuario $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function login(LoginModel $loginModel): UsuarioModel
    {
        return $this->usuarioRepository->login($loginModel);
    }
}
