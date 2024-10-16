<?php
session_start();
if (!isset($_SESSION['usuario_nombre'])) {
    header("Location: /Proyecto_Web_PHP_/Views/Html/LoginForms/Login.php?error=not_logged_in");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cursos</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Cursos</h1>
        <p>Aquí puedes gestionar los cursos.</p>

        <!-- Botón para Crear Curso -->
        <form action="crear_curso.php" method="get">
            <button type="submit">Crear Curso</button>
        </form>

        <!-- Botón para Buscar Curso -->
        <form action="buscar_curso.php" method="get">
            <button type="submit">Buscar Curso</button>
        </form>

        <!-- Botón para Editar Curso -->
        <form action="editar_curso.php" method="get">
            <button type="submit">Editar Curso</button>
        </form>

        <!-- Botón para Listar Cursos -->
        <form action="/Proyecto_Web_PHP_/Application/Handlers/Handle_Listar_Cursos.php" method="get">
            <button type="submit">Listar Cursos</button>
        </form>

        <!-- Botón para Eliminar Curso -->
        <form action="eliminar_curso.php" method="get">
            <button type="submit">Eliminar Curso</button>
        </form>

        <p><a href="/Proyecto_Web_PHP_/Views/Html/LoginForms/Welcome.php">Volver</a></p>
    </div>
</body>

</html>