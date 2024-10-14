<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../views/html/login.php?message=logged_out");
exit();
