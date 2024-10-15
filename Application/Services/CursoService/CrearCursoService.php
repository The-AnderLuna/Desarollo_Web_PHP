<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICrearCurso.php";

class CrearCursoService implements ICrearCurso
{
    private $cursoRepository;

    public function __construct(ICursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    public function crear(CursoModel $cursoModel): int
    {
        return $this->cursoRepository->crear($cursoModel);
    }
}
