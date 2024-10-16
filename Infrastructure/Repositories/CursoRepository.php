<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Databases/Entities/CursoEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";

class CursoRepository implements ICursoRepository
{
    public function crear(CursoModel $cursoModel): int
    {
        try {
            $cursoEntity = CursoEntity::mapperModelToEntity($cursoModel);
            $cursoEntity->save();
            return $cursoEntity->id;
        } catch (Exception $e) {
            throw new Exception("Error al crear el curso: " . $e->getMessage());
        }
    }
    // Método combinado para buscar y ver curso
    public function buscarYVerCurso($cursoId): CursoModel
    {
        try {
            $curso = CursoEntity::find_by_id($cursoId);
            if ($curso) {
                return $curso->mapperEntityToModel();
            } else {
                $message = "Curso con ID $cursoId no encontrado";
                throw new CursoNoEncontradoException($message);
            }
        } catch (CursoNoEncontradoException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception("Ocurrió un error inesperado: " . $e->getMessage());
        }
    }
    public function editarCurso(CursoModel $cursoModel)
    {
        try {
            $curso = CursoEntity::find_by_id($cursoModel->getId());
            if ($curso) {
                $curso->nombre = $cursoModel->getNombre();
                $curso->duracion = $cursoModel->getDuracion();
                $curso->estudiantes = $cursoModel->getEstudiantes();
                $curso->fecha_inicio = $cursoModel->getFechaInicio();
                $curso->usuario_id = $cursoModel->getUsuarioId();
                $curso->save();
            } else {
                throw new CursoNoEncontradoException("Curso con ID " . $cursoModel->getId() . " no encontrado");
            }
        } catch (Exception $e) {
            throw new Exception("Error al editar el curso: " . $e->getMessage());
        }
    }
    // Método para eliminar cursos
    public function eliminarCurso(int $cursoId)
    {
        $curso = CursoEntity::find_by_id($cursoId);
        if ($curso) {
            $curso->delete();
        } else {
            throw new CursoNoEncontradoException("Curso con ID: $cursoId no encontrado");
        }
    }

    // Método para listar cursos
    public function listarCursos(): array
    {
        $cursos = CursoEntity::all();
        $cursoModelList = [];
        foreach ($cursos as $curso) {
            $cursoModelList[] = $curso->mapperEntityToModel();
        }
        return $cursoModelList;
    }
}
