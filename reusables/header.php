<?php
/**
 * header.php — Capçalera simple de MONTSIÀ30
 * Ús: include 'header.php';
 * Opcional: defineix $titolPagina i $rutaBase abans d'incloure
 */
$titolPagina = $titolPagina ?? 'MONTSIÀ30';
$rutaBase    = $rutaBase    ?? '';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($titolPagina) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    header {
      width: 100%;
      background-color: #DCE8F7;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .barradalt {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 10px 20px;
      background-color: #dce8f7;
    }
    .barradalt img {
      width: 100px;
      height: auto;
    }
    .boton-h1 {
      all: unset;
      font-size: 2.2rem;
      font-weight: 800;
      color: #1F85DE;
      cursor: pointer;
      font-family: 'Poppins', sans-serif;
      transition: opacity 0.3s ease;
    }
    .boton-h1:hover { opacity: 0.7; }
  </style>
</head>
<body>

<header>
  <div class="barradalt">
    <img src="<?= $rutaBase ?>img/LOGO.png" alt="Logo Montsià30">
    <button class="boton-h1" onclick="window.location.href='<?= $rutaBase ?>index.php'">MONTSIÀ30</button>
  </div>
</header>
