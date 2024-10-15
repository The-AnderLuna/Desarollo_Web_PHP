<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Databases/Entities/CursoEntity.php";

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

}
