<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'exists') {
            echo '<p class="error">El usuario ya existe. Por favor, intenta con otro correo.</p>';
        } elseif (isset($_GET['message']) && $_GET['message'] == 'password_length') {
            echo '<p class="error">La contraseña debe tener al menos 12 caracteres.</p>';
        }
        ?>
        <form action="../../application/handlers/Handle_Register.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="Profesor">Profesor</option>
                <option value="Estudiante">Estudiante</option>
            </select>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión aquí</a></p>
    </div>
</body>
</html>

