<?php
require_once "../reusables/autenticació.php";

// Variables opcionals per al header
$titolPagina = 'Menú principal';
$rutaBase    = '../';   // perquè estàs dins de /pagines

require_once "../reusables/header.php";
?>

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

<?php require_once "../reusables/footer.php"; ?>