<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Usuario</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Buscar Usuario</h1>
        
        <!-- Mostrar mensajes -->
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'Usuario no encontrado') {
            echo '<p class="error">Usuario no encontrado. Por favor, verifica el correo e intenta nuevamente.</p>';
        } elseif (isset($_GET['message']) && strpos($_GET['message'], 'Usuario encontrado') !== false) {
            echo '<p class="success">' . htmlspecialchars($_GET['message']) . '</p>';
        }
        ?>

        <form action="/Proyecto_Web_PHP_/Application/Handlers/Handle_Buscar_Usuario.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <button type="submit">Buscar Usuario</button>
        </form>
        
        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/UsuarioForms/Usuario.php'">Volver</button>
    </div>
</body>
</html>
