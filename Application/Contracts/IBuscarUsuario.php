<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";

interface IBuscarUsuario {
    public function buscar(string $correo): UsuarioModel;
}
