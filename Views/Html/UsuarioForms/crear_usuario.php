<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Crear Usuario</h1>
        
        <!-- Mostrar mensajes -->
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'exists') {
            echo '<p class="error">El usuario ya existe. Por favor, intenta con otro correo.</p>';
        } elseif (isset($_GET['message']) && $_GET['message'] == 'password_length') {
            echo '<p class="error">La contraseña debe tener al menos 12 caracteres.</p>';
        } elseif (isset($_GET['message']) && $_GET['message'] == 'Usuario registrado correctamente') {
            echo '<p class="success">Usuario registrado correctamente.</p>';
        }
        ?>

        <form action="/Proyecto_Web_PHP_/Application/Handlers/Handle_Crear_Usuario.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
            <br>
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="Profesor">Profesor</option>
                <option value="Estudiante">Estudiante</option>
            </select>
            <br>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <br>
            <button type="submit">Crear Usuario</button>
        </form>

        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/UsuarioForms/Usuario.php'">Volver</button>
    </div>
</body>
</html>
