<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <?php
        if (isset($_GET['message'])) {
            if ($_GET['message'] == 'password_updated') {
                echo '<p class="success">Contraseña actualizada. Por favor, inicia sesión con tu nueva contraseña.</p>';
            } elseif ($_GET['message'] == 'logged_out') {
                echo '<p class="success">Has cerrado sesión correctamente.</p>';
            }
        }
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'incorrect_credentials') {
                echo '<p class="error">Datos incorrectos. Por favor, inténtalo de nuevo.</p>';
            } elseif ($_GET['error'] == 'unexpected_error') {
                echo '<p class="error">Ha ocurrido un error inesperado. Por favor, inténtalo más tarde.</p>';
            } elseif ($_GET['error'] == 'not_logged_in') {
                echo '<p class="error">Debes iniciar sesión para acceder a esta página.</p>';
            }
        }
        ?>
        <form action="../../application/handlers/Handle_Login.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
        <p><a href="Reset_Request.php">¿Olvidaste tu contraseña?</a></p>
    </div>
</body>

</html>