<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/IBuscarYVerCurso.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/BuscarYVerCursoService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cursoId = $_POST['cursoId'];

    try {
        $cursoRepository = new CursoRepository();
        $buscarYVerCursoService = new BuscarYVerCursoService($cursoRepository);
        $curso = $buscarYVerCursoService->buscarYVerCurso($cursoId);

        $_SESSION['curso'] = [
            'nombre' => $curso->getNombre(),
            'duracion' => $curso->getDuracion(),
            'estudiantes' => $curso->getEstudiantes(),
            'fecha_inicio' => $curso->getFechaInicio()->format('Y-m-d'),
            'profesor' => $_SESSION['usuario_nombre']
        ];

        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/buscar_curso.php");
        exit();
    } catch (CursoNoEncontradoException $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/buscar_curso.php?error=" . urlencode($e->getMessage()));
        exit();
    } catch (Exception $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/buscar_curso.php?error=" . urlencode("Error inesperado: " . $e->getMessage()));
        exit();
    }
}
