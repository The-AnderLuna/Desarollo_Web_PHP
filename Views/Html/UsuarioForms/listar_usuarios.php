<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";
$usuarios = isset($_SESSION['usuarios']) ? unserialize($_SESSION['usuarios']) : [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="/Proyecto_Web_PHP_/Views/Css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <?php if (!empty($usuarios)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario->getNombre()) ?></td>
                            <td><?= htmlspecialchars($usuario->getApellidos()) ?></td>
                            <td><?= htmlspecialchars($usuario->getEmail()) ?></td>
                            <td><?= htmlspecialchars($usuario->getTelefono()) ?></td>
                            <td><?= htmlspecialchars($usuario->getRol()) ?></td>
                            <td><?= htmlspecialchars($usuario->getEstado()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No se encontraron usuarios.</p>
        <?php endif; ?>
        <button onclick="location.href='/Proyecto_Web_PHP_/Views/Html/UsuarioForms/Usuario.php'">Volver</button>
    </div>
</body>
</html>
