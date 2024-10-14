<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario_nombre'])) {
        header("Location: login.php?error=not_logged_in");
        exit();
    }
    ?>
    <div class="container">
        <h1>Bienvenido, <?php echo $_SESSION['usuario_nombre'] . " " . $_SESSION['usuario_apellido']; ?></h1>
        <div class="options">
            <a href="Usuario.php" class="option">Usuarios</a>
            <a href="Curso.php" class="option">Cursos</a>
            <a href="../../application/handlers/Handle_Logout.php" class="option logout">Cerrar Sesión</a>
        </div>
    </div>
    <style>
        .options {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .option {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .option:hover {
            background-color: #0056b3;
        }
        .logout {
            background-color: #dc3545; 
        }
        .logout:hover {
            background-color: #c82333;
        }
    </style>
</body>
</html>
