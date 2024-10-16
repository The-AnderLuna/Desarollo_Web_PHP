<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/IBuscarYVerCurso.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";


class BuscarYVerCursoService implements IBuscarYVerCurso
{
    private $cursoRepository;

    public function __construct(ICursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    public function buscarYVerCurso($cursoId): CursoModel
    {
        try {
            return $this->cursoRepository->buscarYVerCurso($cursoId);
        } catch (CursoNoEncontradoException $e) {
            throw new CursoNoEncontradoException("Curso con ID $cursoId no encontrado");
        }
    }
}
