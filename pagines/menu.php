<?php
require_once "../reusables/autenticació.php";
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Menú principal</title>
</head>
<body>
    <h1>Menú principal</h1>

    <p>Usuari: <?= htmlspecialchars($_SESSION["usuari"]) ?></p>
    <p>Rol: <?= htmlspecialchars($_SESSION["rol"]) ?></p>

    <?php if ($_SESSION["rol"] === "professor"): ?>
        <h2>Opcions de professorat</h2>
        <ul>
            <li><a href="gestio_material.php">Gestió de material</a></li>
            <li><a href="gestio_alumnes.php">Gestió d'alumnes</a></li>
            <li><a href="gestio_incidencies.php">Gestió d'incidències</a></li>
        </ul>
    <?php elseif ($_SESSION["rol"] === "alumne"): ?>
        <h2>Opcions d'alumnat</h2>
        <ul>
            <li><a href="gestio_material.php">Estat dels meus dispositius</a></li>
        </ul>
    <?php endif; ?>

    <p><a href="logout.php">Tancar sessió</a></p>
</body>
</html>
