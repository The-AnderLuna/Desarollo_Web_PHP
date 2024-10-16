<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/IBuscarYVerCurso.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/BuscarYVerCursoService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";;

// Simular inicio de sesión
session_start();
$_SESSION['usuario_id'] = 227; // ID de usuario
$_SESSION['usuario_nombre'] = "shelsy Trespalacios"; // Nombre del usuario

class TestBuscarYVerCurso
{
    public static function testBuscarYVerCurso()
    {
        $cursoId = 6; // ID del curso de PHP

        try {
            $cursoRepository = new CursoRepository();
            $buscarYVerCursoService = new BuscarYVerCursoService($cursoRepository);
            $curso = $buscarYVerCursoService->buscarYVerCurso($cursoId);

            // Mostrar detalles del curso
            echo "Nombre del Curso: " . $curso->getNombre() . "<br>";
            echo "Duración: " . $curso->getDuracion() . "<br>";
            echo "Estudiantes: " . $curso->getEstudiantes() . "<br>";
            echo "Fecha de Inicio: " . $curso->getFechaInicio()->format('Y-m-d') . "<br>"; // Formatear la fecha
            echo "Profesor: " . $_SESSION['usuario_nombre'] . "<br>";
        } catch (CursoNoEncontradoException $e) {
            echo "Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error inesperado: " . $e->getMessage();
        }
    }
}

// Ejecutar el test
TestBuscarYVerCurso::testBuscarYVerCurso();
