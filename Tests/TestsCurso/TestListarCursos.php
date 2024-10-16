<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Repositories/CursoRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Application/Services/CursoService/ListarCursosService.php";

// Simular inicio de sesión si no está ya activo
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['usuario_id'] = 227; // ID de usuario
$_SESSION['usuario_nombre'] = "shelsy Trespalacios"; // Nombre correcto del usuario

class TestListarCursos
{
    public static function testListarCursos()
    {
        try {
            // Instanciar repository y service
            $cursoRepository = new CursoRepository();
            $listarCursosService = new ListarCursosService($cursoRepository);

            // Listar los cursos
            $cursos = $listarCursosService->listarCursos();

            // Mostrar detalles de los cursos
            foreach ($cursos as $curso) {
                echo "Nombre del Curso: " . $curso->getNombre() . "<br>";
                echo "Duración: " . $curso->getDuracion() . "<br>";
                echo "Estudiantes: " . $curso->getEstudiantes() . "<br>";
                echo "Fecha de Inicio: " . $curso->getFechaInicio()->format('Y-m-d') . "<br>";
                echo "Profesor: " . $_SESSION['usuario_nombre'] . "<br><br>";
            }
        } catch (Exception $e) {
            echo "Error inesperado: " . $e->getMessage();
        }
    }
}

// Ejecutar el test
TestListarCursos::testListarCursos();
