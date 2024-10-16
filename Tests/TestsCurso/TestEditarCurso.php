<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/EditarCursoService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";

// Simular inicio de sesión
session_start();
$_SESSION['usuario_id'] = 227; // ID de usuario
$_SESSION['usuario_nombre'] = "shelsy Trespalacios"; // Nombre correcto del usuario

class TestEditarCurso
{
    public static function testEditarCurso()
    {
        // Datos del curso a editar
        $cursoId = 9; // ID del curso de PHP
        $nuevoNombre = "Curso de PHP Avanzado";
        $nuevaDuracion = 40;
        $nuevosEstudiantes = 20;
        $nuevaFechaInicio = new DateTime('2023-06-01');
        $usuarioId = $_SESSION['usuario_id'];

        try {
            // Crear instancia de CursoModel con nuevos datos
            $cursoModel = new CursoModel($cursoId, $nuevoNombre, $nuevaDuracion, $nuevosEstudiantes, $nuevaFechaInicio, $usuarioId);

            // Instanciar repository y service
            $cursoRepository = new CursoRepository();
            $editarCursoService = new EditarCursoService($cursoRepository);

            // Editar el curso
            $editarCursoService->editarCurso($cursoModel);

            // Verificar si los cambios se guardaron
            $cursoEditado = $cursoRepository->buscarYVerCurso($cursoId);
            echo "Nombre del Curso: " . $cursoEditado->getNombre() . "<br>";
            echo "Duración: " . $cursoEditado->getDuracion() . "<br>";
            echo "Estudiantes: " . $cursoEditado->getEstudiantes() . "<br>";
            echo "Fecha de Inicio: " . $cursoEditado->getFechaInicio()->format('Y-m-d') . "<br>";
            echo "Profesor: " . $_SESSION['usuario_nombre'] . "<br>";
        } catch (CursoNoEncontradoException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error inesperado: " . $e->getMessage();
        }
    }
}

// Ejecutar el test
TestEditarCurso::testEditarCurso();
