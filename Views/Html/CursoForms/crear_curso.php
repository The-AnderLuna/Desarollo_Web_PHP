<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Crear Curso</h1>

        <!-- Mostrar mensajes -->
        <?php if (isset($_GET['message'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form action="/Proyecto_Web_PHP_/Application/Handlers/Handle_Crear_Curso.php" method="post">
            <label for="nombre">Nombre del Curso:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="duracion">Duración (horas):</label>
            <input type="number" id="duracion" name="duracion" required>
            <br>
            <label for="estudiantes">Número de Estudiantes:</label>
            <input type="number" id="estudiantes" name="estudiantes" required>
            <br>
            <label for="fecha_inicio">Fecha de Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" required>
            <br>
            <button type="submit">Crear Curso</button>
        </form>

        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/CursoForms/Curso.php'">Volver</button>
    </div>
</body>

</html>