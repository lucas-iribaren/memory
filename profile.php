<?php
// profile.php

session_start();
require_once 'classes/Player.php';

$player = unserialize($_SESSION['player']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil du joueur - Memory Game 2.0</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Profil de <?php echo htmlspecialchars($player->getName()); ?></h1>
    <p>Meilleur score : <?php echo $player->getBestScore(); ?></p>
    <p>Historique des scores :</p>
    <ul>
        <?php foreach ($player->getProfile()['scores'] as $score): ?>
            <li><?php echo $score; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Jouer encore</a>
</body>
</html>
