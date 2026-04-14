<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["user_id"], $_SESSION["rol"])) {
    header("Location: /pagines/login.php");
    exit;
}

if (isset($rolNecessari) && $_SESSION["rol"] !== $rolNecessari) {
    die("Accés no autoritzat.");
}
