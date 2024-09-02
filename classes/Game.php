<?php
// classes/Game.php

require_once 'Card.php';
require_once 'Player.php';
require_once 'Leaderboard.php';

class Game {
    private $cards = [];
    private $pairsCount;
    private $score = 0;
    private $startTime;

    public function __construct($pairsCount) {
        $this->pairsCount = $pairsCount;
        $this->startTime = time();
        $this->initializeGame();
    }

    private function initializeGame() {
        $allImages = range(1, 25);

        shuffle($allImages);
        shuffle($allImages);
        shuffle($allImages);
        
        // Ne sélectionne que le nombre de paires nécessaire
        $selectedImages = array_slice($allImages, 0, $this->pairsCount);

        // Ajoute chaque image sélectionnée deux fois pour créer des paires
        foreach ($selectedImages as $image) {
            $this->cards[] = new Card($image, $image);
            $this->cards[] = new Card($image, $image);
        }

        // Mélanger les cartes pour qu'elles soient en ordre aléatoire
        shuffle($this->cards);
    }



    public function getCards() {
        return $this->cards;
    }

    public function checkForWin() {
        foreach ($this->cards as $card) {
            if (!$card->isMatched()) {
                return false;
            }
        }
        return true;
    }

    public function endGame(Player $player) {
        $timeTaken = time() - $this->startTime;
        $this->score = 1000 - ($timeTaken * 2); // Exemple de calcul de score
        $player->addScore($this->score);

        $leaderboard = new Leaderboard();
        $leaderboard->updateLeaderboard($player);
    }

    public function getScore() {
        return $this->score;
    }
}
