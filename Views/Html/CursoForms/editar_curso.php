<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Editar Curso</h1>

        <!-- Mostrar mensajes -->
        <?php if (isset($_GET['message'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form action="/Proyecto_Web_PHP_/Application/handlers/Handle_Editar_Curso.php" method="post">
            <label for="cursoId">ID del Curso:</label>
            <input type="number" id="cursoId" name="cursoId" required>
            <br>
            <label for="nombre">Nuevo Nombre del Curso:</label>
            <input type="text" id="nombre" name="nombre">
            <br>
            <label for="duracion">Nueva Duración (horas):</label>
            <input type="number" id="duracion" name="duracion">
            <br>
            <label for="estudiantes">Nuevo Número de Estudiantes:</label>
            <input type="number" id="estudiantes" name="estudiantes">
            <br>
            <label for="fecha_inicio">Nueva Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio">
            <br>
            <input type="hidden" id="usuario_id" name="usuario_id" value="<?= $_SESSION['usuario_id'] ?>">
            <button type="submit">Editar Curso</button>
        </form>

        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/CursoForms/Curso.php'">Volver</button>
    </div>
</body>

</html>