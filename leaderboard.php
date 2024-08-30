    <?php
    // leaderboard.php

    require_once 'classes/Leaderboard.php';

    $leaderboard = new Leaderboard();
    $topPlayers = $leaderboard->getTopPlayers();
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Classement - Memory Game 2.0</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Classement des meilleurs joueurs</h1>
        <ol>
            <?php foreach ($topPlayers as $playerName => $score): ?>
                <li><?php echo htmlspecialchars($playerName); ?>: <?php echo $score; ?></li>
            <?php endforeach; ?>
        </ol>
        <a href="index.php">Retour à l'accueil</a>
    </body>
    </html>
