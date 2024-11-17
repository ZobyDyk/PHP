<?php
// Start session
session_start();

// Generování náhodné hodnoty
$randomValue = rand(1, 100);

// Uložení hodnoty do session a cookie
$_SESSION['value'] = $randomValue;
setcookie('value', $randomValue, time() + 3600, '/');

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Předání hodnoty</title>
</head>
<body>
    <h3>Vygenerovaná hodnota: <?= htmlspecialchars($randomValue) ?></h3>

    <h4>Odkazy na b.php:</h4>
    <ul>
        <li><a href="b.php?value=<?= $randomValue ?>">Předání pomocí GET</a></li>
        <li>
            <form action="b.php" method="post" style="display:inline;">
                <input type="hidden" name="value" value="<?= $randomValue ?>">
                <button type="submit">Předání pomocí POST</button>
            </form>
        </li>
        <li><a href="b.php?method=session">Předání pomocí SESSION</a></li>
        <li><a href="b.php?method=cookie">Předání pomocí COOKIE</a></li>
    </ul>
</body>
</html>
