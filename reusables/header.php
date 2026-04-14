<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <h1>CAS 3 - IAW</h1>
    <?php if (isset($_SESSION["usuari"])): ?>
        <p>Usuari actiu: <?= htmlspecialchars($_SESSION["usuari"]) ?></p>
    <?php endif; ?>
    <hr>
</header>
