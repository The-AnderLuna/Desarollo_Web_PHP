<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IBuscarUsuario.php";

class BuscarUsuarioService implements IBuscarUsuario {
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function buscar(string $correo): UsuarioModel {
        return $this->usuarioRepository->buscar($correo);
    }
}