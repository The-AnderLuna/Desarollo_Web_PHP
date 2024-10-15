<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICrearCurso.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/CrearCursoService.php";

class TestCrearCurso
{
    public static function testCrearCurso()
    {
        // Arrange
        $cursoModel = new CursoModel(null, "Curso de PHP", 30, 0, "2023-05-01", 227);

        try {
            $cursoRepository = new CursoRepository();
            $crearCursoService = new CrearCursoService($cursoRepository);

            // Act
            $cursoId = $crearCursoService->crear($cursoModel);

            // Assert
            echo "El curso se ha creado correctamente con el ID: " . $cursoId;
        } catch (Exception $e) {
            echo "Ha ocurrido un error inesperado: " . $e->getMessage();
        }
    }
}


TestCrearCurso::testCrearCurso();
