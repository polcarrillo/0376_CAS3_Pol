<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../config/db.php';

if (isset($_SESSION["user_id"], $_SESSION["rol"])) {
    if ($_SESSION["rol"] === "professor") {
        header("Location: professor/dashboard.php");
        exit;
    }

    if ($_SESSION["rol"] === "alumne") {
        header("Location: alumne/dispositius.php");
        exit;
    }
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuari = trim($_POST["usuari"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($usuari === "" || $password === "") {
        $error = "Has d'omplir tots els camps.";
    } else {
        $stmt = $pdo->prepare("SELECT id, usuari, password, rol, idAlumne FROM Usuaris WHERE usuari = ?");
        $stmt->execute([$usuari]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = (int) $user["id"];
            $_SESSION["usuari"] = $user["usuari"];
            $_SESSION["rol"] = $user["rol"];
            $_SESSION["idAlumne"] = $user["idAlumne"] !== null ? (int) $user["idAlumne"] : null;

            if ($user["rol"] === "professor") {
                header("Location: professor/dashboard.php");
                exit;
            }

            if ($user["rol"] === "alumne") {
                header("Location: alumne/dispositius.php");
                exit;
            }

            session_unset();
            session_destroy();
            $error = "Rol d'usuari no vàlid.";
        } else {
            $error = "Usuari o contrasenya incorrectes.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CAS3</title>
</head>
<body>
    <h1>Inici de sessió</h1>

    <?php if ($error !== ""): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <div>
            <label for="usuari">Usuari</label>
            <input type="text" name="usuari" id="usuari" required>
        </div>

        <div>
            <label for="password">Contrasenya</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
