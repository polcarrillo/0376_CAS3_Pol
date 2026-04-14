<?php
session_start();

/*
Aquest fitxer és el punt d'entrada de l'aplicació.
Segons l'enunciat, hem de gestionar sessions i diferenciar rols.
Per tant, aquí comprovem si l'usuari està loguejat i cap a on l'hem d'enviar.
*/

// Si NO hi ha sessió → login
if (!isset($_SESSION["user_id"])) {
    header("Location: pagines/login.php");
    exit;
}

// Si HI ha sessió → redirigir segons rol
if ($_SESSION["rol"] === "professor") {
    header("Location: pagines/professor/dashboard.php");
    exit;
}

if ($_SESSION["rol"] === "alumne") {
    header("Location: pagines/alumne/dispositius.php");
    exit;
}

// Si passa alguna cosa rara (rol no definit)
session_destroy();
header("Location: pagines/login.php");
exit;
?>
