<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/IListarCurso.php";

class ListarCursosService implements IListarCursos
{
    private $cursoRepository;

    public function __construct(ICursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    public function listarCursos(): array
    {
        return $this->cursoRepository->listarCursos();
    }
}
