<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IContarUsuario.php";

class ContarUsuarioService implements IContarUsuario
{
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }
    public function contarUsuario(): int
    {
        return $this->usuarioRepository->contar();
    }
}
