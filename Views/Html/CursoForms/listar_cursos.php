<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";
$cursos = isset($_SESSION['cursos']) ? unserialize($_SESSION['cursos']) : [];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Cursos</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Lista de Cursos</h1>
        <?php if (!empty($cursos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Duración</th>
                        <th>Estudiantes</th>
                        <th>Fecha de Inicio</th>
                        <th>Profesor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cursos as $curso): ?>
                        <tr>
                            <td><?= htmlspecialchars($curso->getNombre()) ?></td>
                            <td><?= htmlspecialchars($curso->getDuracion()) ?></td>
                            <td><?= htmlspecialchars($curso->getEstudiantes()) ?></td>
                            <td><?= htmlspecialchars($curso->getFechaInicio()) ?></td>
                            <td><?= htmlspecialchars($_SESSION['usuario_nombre']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron cursos.</p>
        <?php endif; ?>
        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/CursoForms/Curso.php'">Volver</button>
    </div>
</body>

</html>