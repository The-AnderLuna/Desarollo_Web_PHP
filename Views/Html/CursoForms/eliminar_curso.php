<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Curso</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Curso</h1>
        
        <!-- Mostrar mensajes -->
        <?php if (isset($_GET['message'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        
        <form action="/Proyecto_Web_PHP_/Application/handlers/Handle_Eliminar_Curso.php" method="post">
            <label for="cursoId">ID del Curso:</label>
            <input type="number" id="cursoId" name="cursoId" required>
            <br>
            <button type="submit">Eliminar Curso</button>
        </form>

        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/CursoForms/Curso.php'">Volver</button>
    </div>
</body>
</html>
