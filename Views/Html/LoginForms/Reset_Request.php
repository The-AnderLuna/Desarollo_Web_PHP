<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Recuperar Contraseña</h1>
        <form action="/Proyecto_Web_PHP_/Application/Handlers/Handle_Reset_Request.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Buscar Correo</button>
        </form>
    </div>
</body>

</html>