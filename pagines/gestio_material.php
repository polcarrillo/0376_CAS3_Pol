<?php
require_once "../reusables/autenticació.php";
require_once "../config/db.php";
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Gestió de material</title>
</head>
<body>
    <h1>Material</h1>

    <?php if ($_SESSION["rol"] === "professor"): ?>
        <h2>Vista professorat</h2>
        <p>Des d'aquí el professorat podrà consultar i gestionar el material segons el que demana l'enunciat.</p>

        <ul>
            <li>Llista de dispositius per tipus i aula</li>
            <li>Llista de dispositius per tipus i a qui està assignat</li>
            <li>Dispositius d'un alumne concret</li>
            <li>Crear nou maquinari</li>
        </ul>

    <?php elseif ($_SESSION["rol"] === "alumne"): ?>
        <h2>Els meus dispositius</h2>

        <?php
        $idAlumne = $_SESSION["idAlumne"] ?? null;

        if ($idAlumne === null) {
            echo "<p>No hi ha cap alumne vinculat a este usuari.</p>";
        } else {
            $sql = "
                SELECT 
                    m.idInventari,
                    m.numSerie,
                    tm.tipus,
                    e.estat
                FROM Assignacions a
                INNER JOIN Material m ON a.idMaterial = m.id
                INNER JOIN TipusMaterial tm ON m.idTipus = tm.id
                LEFT JOIN Incidencies i 
                    ON i.idDispositiu = m.id
                    AND i.idAlumne = a.idAlumne
                    AND i.dataTancada IS NULL
                LEFT JOIN Estats e ON i.idEstat = e.id
                WHERE a.idAlumne = ?
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idAlumne]);
            $dispositius = $stmt->fetchAll();

            if (!$dispositius) {
                echo "<p>No tens dispositius assignats.</p>";
            } else {
                echo "<table border='1' cellpadding='6'>";
                echo "<tr><th>Tipus</th><th>Inventari</th><th>Número de sèrie</th><th>Estat</th></tr>";

                foreach ($dispositius as $d) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($d["tipus"]) . "</td>";
                    echo "<td>" . htmlspecialchars($d["idInventari"]) . "</td>";
                    echo "<td>" . htmlspecialchars($d["numSerie"]) . "</td>";
                    echo "<td>" . htmlspecialchars($d["estat"] ?? "Sense incidència oberta") . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }
        }
        ?>
    <?php endif; ?>

    <p><a href="menu.php">Tornar al menú</a></p>
</body>
</html>
