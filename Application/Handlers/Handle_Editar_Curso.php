<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/EditarCursoService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Execptions/CursoNoEncontradoException.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cursoId = $_POST['cursoId'];
    $nombre = $_POST['nombre'];
    $duracion = $_POST['duracion'];
    $estudiantes = $_POST['estudiantes'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $usuarioId = $_SESSION['usuario_id'];

    try {
        $cursoModel = new CursoModel($cursoId, $nombre, $duracion, $estudiantes, $fecha_inicio, $usuarioId);
        $cursoRepository = new CursoRepository();
        $editarCursoService = new EditarCursoService($cursoRepository);

        $editarCursoService->editarCurso($cursoModel);

        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/editar_curso.php?message=Curso+editado+correctamente");
        exit();
    } catch (CursoNoEncontradoException $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/editar_curso.php?error=" . urlencode($e->getMessage()));
        exit();
    } catch (Exception $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/editar_curso.php?error=" . urlencode("Error inesperado: " . $e->getMessage()));
        exit();
    }
}
