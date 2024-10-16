<?php
session_start();
session_unset();
session_destroy();
header("Location: /Proyecto_Web_PHP_/Views/Html/LoginForms/Login.php?message=logged_out");
exit();
