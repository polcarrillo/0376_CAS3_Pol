<?php
session_start();

if (!isset($_SESSION["user_id"], $_SESSION["rol"])) {
    header("Location: pagines/login.php");
    exit;
}

header("Location: pagines/menu.php");
exit;
