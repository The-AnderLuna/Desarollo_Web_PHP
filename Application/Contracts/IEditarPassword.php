<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
interface IEditarPassword
{
    public function editarPassword(string $email, string $password);
}
