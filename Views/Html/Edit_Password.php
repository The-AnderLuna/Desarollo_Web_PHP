<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Contraseña</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Contraseña</h1>
        <form action="../../application/handlers/Handle_Edit_Password.php" method="post">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">
            <label for="password">Nueva Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Actualizar Contraseña</button>
        </form>
    </div>
</body>
</html>
