<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";

interface ICursoRepository
{
    public function crear(CursoModel $cursoModel): int;

    public function buscarYVerCurso($cursoId): CursoModel;

    public function editarCurso(CursoModel $cursoModel);
    public function eliminarCurso(int $cursoId);
    public function listarCursos(): array;
}
