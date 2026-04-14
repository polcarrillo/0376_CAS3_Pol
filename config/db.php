<?php
declare(strict_types=1);

$host = "localhost";
$dbname = "cas3_montsia";
$user = "cas3user";
$pass = "cas3pass";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    exit("Error de connexió amb la base de dades.");
}
