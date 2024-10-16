<?php
// Iniciar sesión para obtener los datos de la búsqueda
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Curso</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/views/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Buscar Curso</h1>

        <!-- Mostrar mensajes de error si existen -->
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red; text-align: center;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <!-- Mostrar detalles del curso si está disponible en la sesión -->
        <?php if (isset($_SESSION['curso'])): ?>
            <table>
                <tr>
                    <th>Nombre del Curso</th>
                    <td><?= htmlspecialchars($_SESSION['curso']['nombre']) ?></td>
                </tr>
                <tr>
                    <th>Duración</th>
                    <td><?= htmlspecialchars($_SESSION['curso']['duracion']) ?></td>
                </tr>
                <tr>
                    <th>Estudiantes</th>
                    <td><?= htmlspecialchars($_SESSION['curso']['estudiantes']) ?></td>
                </tr>
                <tr>
                    <th>Fecha de Inicio</th>
                    <td><?= htmlspecialchars($_SESSION['curso']['fecha_inicio']) ?></td>
                </tr>
                <tr>
                    <th>Profesor</th>
                    <td><?= htmlspecialchars($_SESSION['curso']['profesor']) ?></td>
                </tr>
            </table>
            <?php unset($_SESSION['curso']); // Limpiar la sesión después de mostrar los datos ?>
        <?php endif; ?>

        <!-- Formulario para buscar el curso por ID -->
        <form action="/Proyecto_Web_PHP_/application/handlers/handle_buscar_curso.php" method="post">
            <label for="cursoId">ID del Curso:</label>
            <input type="number" id="cursoId" name="cursoId" required>
            <br>
            <button type="submit">Buscar Curso</button>
        </form>

        <!-- Botón para regresar -->
        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/CursoForms/Curso.php'">Volver</button>
    </div>
</body>
</html>
