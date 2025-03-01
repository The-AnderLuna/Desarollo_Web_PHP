<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";

interface IUsuarioRepository
{
    public function crear(UsuarioModel $usuarioModel): int;
    public function buscar(string $correo): ?UsuarioModel;

    public function contar(): int;
    public function editar(UsuarioModel $usuarioModel);
    public function listar(): array;
    public function editarPassword(string $email, string $password);
    
}
