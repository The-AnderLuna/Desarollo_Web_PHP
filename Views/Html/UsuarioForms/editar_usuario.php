<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Editar Usuario</h1>

        <!-- Mostrar mensajes -->
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'Usuario no encontrado') {
            echo '<p class="error">Usuario no encontrado. Por favor, verifica el correo e intenta nuevamente.</p>';
        } elseif (isset($_GET['message']) && $_GET['message'] == 'Usuario editado correctamente') {
            echo '<p class="success">Usuario editado correctamente.</p>';
        }
        ?>

        <form action="/Proyecto_Web_PHP_/Application/Handlers/Handle_Editar_Usuario.php" method="post">
            <label for="email">Correo Electrónico del Usuario:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="nombre">Nuevo Nombre:</label>
            <input type="text" id="nombre" name="nombre">
            <br>
            <label for="apellidos">Nuevos Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos">
            <br>
            <label for="password">Nueva Contraseña:</label>
            <input type="password" id="password" name="password">
            <br>
            <label for="telefono">Nuevo Teléfono:</label>
            <input type="text" id="telefono" name="telefono">
            <br>
            <label for="estado">Nuevo Estado:</label>
            <select id="estado" name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
            <br>
            <button type="submit">Editar Usuario</button>
        </form>

        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/UsuarioForms/Usuario.php'">Volver</button>
    </div>
</body>

</html>