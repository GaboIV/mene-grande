<?php
include("auth_helper.php");

// Cerrar sesión
AuthHelper::logout();

// Redirigir al login
header("Location: index.php");
exit;
?>