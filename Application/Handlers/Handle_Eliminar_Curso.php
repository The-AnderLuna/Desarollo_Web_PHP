<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/EliminarCursoService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cursoId = $_POST['cursoId'];

    try {
        $cursoRepository = new CursoRepository();
        $eliminarCursoService = new EliminarCursoService($cursoRepository);
        // Eliminar el curso
        $eliminarCursoService->eliminarCurso($cursoId);
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/eliminar_curso.php?message=Curso+con+ID:+$cursoId+eliminado+correctamente");
        exit();
    } catch (CursoNoEncontradoException $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/eliminar_curso.php?error=" . urlencode($e->getMessage()));
        exit();
    } catch (Exception $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/eliminar_curso.php?error=" . urlencode("Error inesperado: " . $e->getMessage()));
        exit();
    }
}
