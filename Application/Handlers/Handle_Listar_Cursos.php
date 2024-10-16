<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/ListarCursosService.php";

session_start();

try {
    $cursoRepository = new CursoRepository();
    $listarCursosService = new ListarCursosService($cursoRepository);
    $cursos = $listarCursosService->listarCursos();

    // Convertir fechas a cadenas antes de guardar los cursos en la sesión
    foreach ($cursos as $curso) {
        $curso->setFechaInicio($curso->getFechaInicio()->format('Y-m-d'));
    }

    // Guardar los cursos en la sesión
    $_SESSION['cursos'] = serialize($cursos);
    header("Location: /Proyecto_Web_PHP_/Views/Html/CursoForms/listar_cursos.php");
    exit();
} catch (Exception $e) {
    echo "Error inesperado: " . $e->getMessage();
    exit();
}
