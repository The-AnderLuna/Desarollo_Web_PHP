<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/IEditarCurso.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";

class EditarCursoService implements IEditarCurso
{
    private $cursoRepository;

    public function __construct(ICursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    public function editarCurso(CursoModel $cursoModel)
    {
        try {
            $this->cursoRepository->editarCurso($cursoModel);
        } catch (CursoNoEncontradoException $e) {
            throw new CursoNoEncontradoException("Curso con ID " . $cursoModel->getId() . " no encontrado");
        } catch (Exception $e) {
            throw new Exception("Error al editar el curso: " . $e->getMessage());
        }
    }
}
