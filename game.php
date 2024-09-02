<?php
// game.php

session_start();
require_once 'classes/Game.php';
require_once 'classes/Player.php';

$game = unserialize($_SESSION['game']);
$player = unserialize($_SESSION['player']);

$cards = $game->getCards();

if ($game->checkForWin()) {
    $game->endGame($player);
    $_SESSION['player'] = serialize($player);
    header('Location: profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu en cours - Memory Game 2.0</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="cards">
    <?php foreach ($cards as $index => $card): ?>
        <div class="card" data-id="<?php echo $card->getId(); ?>" data-index="<?php echo $index; ?>">
            <img src="images/<?php echo htmlspecialchars($card->getImage()); ?>.png" alt="Carte" class="hidden">
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
