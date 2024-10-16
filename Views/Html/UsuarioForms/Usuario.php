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
    <title>Usuarios</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Usuarios</h1>
        <p>Aquí puedes gestionar los usuarios.</p>

        <!-- Botón para Crear Usuario -->
        <form action="crear_usuario.php" method="get">
            <button type="submit">Crear Usuario</button>
        </form>

        <!-- Botón para Buscar Usuario -->
        <form action="buscar_usuario.php" method="get">
            <button type="submit">Buscar Usuario</button>
        </form>

        <!-- Botón para Editar Usuario -->
        <form action="editar_usuario.php" method="get">
            <button type="submit">Editar Usuario</button>
        </form>

        <!-- Botón para Listar Usuarios -->
        <form action="/Proyecto_Web_PHP_/Application/Handlers/Handle_Listar_Usuarios.php" method="post">
            <button type="submit">Listar Usuarios</button>
        </form>

        <p><a href="/Proyecto_Web_PHP_/Views/Html/LoginForms/Welcome.php">Volver</a></p>
    </div>
</body>
</html>
