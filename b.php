<?php
session_start();

// Získání hodnoty podle metody
$value = null;

if (isset($_GET['value'])) {
    $value = $_GET['value'];
    $method = 'GET';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['value'])) {
    $value = $_POST['value'];
    $method = 'POST';
} elseif (isset($_GET['method']) && $_GET['method'] === 'session' && isset($_SESSION['value'])) {
    $value = $_SESSION['value'];
    $method = 'SESSION';
} elseif (isset($_GET['method']) && $_GET['method'] === 'cookie' && isset($_COOKIE['value'])) {
    $value = $_COOKIE['value'];
    $method = 'COOKIE';
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zobrazení hodnoty</title>
</head>
<body>
    <?php if ($value !== null): ?>
        <h3>Hodnota přijatá přes <?= htmlspecialchars($method) ?>: <?= htmlspecialchars($value) ?></h3>
    <?php else: ?>
        <h3>Nebyla předána žádná hodnota.</h3>
    <?php endif; ?>
</body>
</html>
