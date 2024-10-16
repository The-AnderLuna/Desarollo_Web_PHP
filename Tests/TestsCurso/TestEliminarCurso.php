<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/EliminarCursoService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";;;

// Simular inicio de sesión si no está ya activo
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['usuario_id'] = 227; // ID de usuario
$_SESSION['usuario_nombre'] = "shelsy Trespalacios"; // Nombre correcto del usuario

class TestEliminarCurso
{
    public static function testEliminarCurso()
    {
        $cursoId = 10; // ID del curso de PHP

        try {
            // Instanciar repository y service
            $cursoRepository = new CursoRepository();
            $eliminarCursoService = new EliminarCursoService($cursoRepository);

            // Eliminar el curso
            $eliminarCursoService->eliminarCurso($cursoId);

            echo "Curso con ID: $cursoId eliminado correctamente.<br>";
        } catch (Exception $e) {
            echo "Error inesperado " . $e->getMessage();
        }
    }
}

// Ejecutar el test
TestEliminarCurso::testEliminarCurso();
