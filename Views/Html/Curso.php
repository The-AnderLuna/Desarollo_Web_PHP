<?php
session_start();
if (!isset($_SESSION['usuario_nombre'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cursos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Cursos</h1>
        <p>Aquí puedes gestionar los cursos.</p>
        <!-- Añade el contenido de gestión de cursos aquí -->
        <p><a href="welcome.php">Volver</a></p>
    </div>
</body>
</html>
