<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Contracts/ICurso/ICrearCurso.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/CrearCursoService.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $duracion = $_POST['duracion'];
    $estudiantes = $_POST['estudiantes'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $usuario_id = $_SESSION['usuario_id'];

    try {
        $cursoModel = new CursoModel(null, $nombre, $duracion, $estudiantes, $fecha_inicio, $usuario_id);
        $cursoRepository = new CursoRepository();
        $crearCursoService = new CrearCursoService($cursoRepository);

        $cursoId = $crearCursoService->crear($cursoModel);

        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/crear_curso.php?message=Curso+creado+correctamente+con+ID:+$cursoId");
        exit();
    } catch (Exception $e) {
        header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/crear_curso.php?error=" . urlencode("Ha ocurrido un error: " . $e->getMessage()));
        exit();
    }
}
