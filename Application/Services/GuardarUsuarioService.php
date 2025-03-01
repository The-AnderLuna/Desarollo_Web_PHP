<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/IGuardarUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/UsuarioEncontradoException.php";

class GuardarUsuarioService implements IGuardarUsuario {
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository) {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function guardarUsuario(UsuarioModel $usuario): int {
        try {
            return $this->usuarioRepository->crear($usuario);
        } catch (UsuarioEncontradoException $e) {
            throw $e;
        }
    }
}