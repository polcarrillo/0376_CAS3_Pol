<?php
session_start();
require_once "../config/db.php";

if (isset($_SESSION["user_id"], $_SESSION["rol"])) {
    header("Location: menu.php");
    exit;
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
            $_SESSION["user_id"] = (int)$user["id"];
            $_SESSION["usuari"] = $user["usuari"];
            $_SESSION["rol"] = $user["rol"];
            $_SESSION["idAlumne"] = $user["idAlumne"] !== null ? (int)$user["idAlumne"] : null;
        }

            header("Location: menu.php");
            exit;
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
    <title>Login</title>
</head>
<body>
    <h1>Inici de sessió</h1>

    <?php if ($error !== ""): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="usuari">Usuari</label>
        <input type="text" name="usuari" id="usuari" required>

        <br><br>

        <label for="password">Contrasenya</label>
        <input type="password" name="password" id="password" required>

        <br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
