<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";

interface ICursoRepository
{
    public function crear(CursoModel $cursoModel): int;

}
