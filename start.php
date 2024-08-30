<?php
// start.php

session_start();
require_once 'classes/Game.php';
require_once 'classes/Player.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerName = $_POST['playerName'];
    $pairsCount = (int)$_POST['pairsCount'];

    $player = new Player($playerName);
    $_SESSION['player'] = serialize($player);

    $game = new Game($pairsCount);
    $_SESSION['game'] = serialize($game);

    header('Location: game.php');
    exit();
}
?>
    