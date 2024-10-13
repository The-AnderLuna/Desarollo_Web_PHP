<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";

interface IListarUsuario {
    public function listarUsuario(): array;
}