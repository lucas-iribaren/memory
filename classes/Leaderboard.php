<?php
// classes/Leaderboard.php

class Leaderboard {
    private $topPlayers = [];

    public function __construct() {
        $this->initializeLeaderboard();
        $this->loadLeaderboard();
    }

    private function initializeLeaderboard() {
        $filename = 'data/leaderboard.json';
        if (!file_exists($filename)) {
            file_put_contents($filename, json_encode([]));
        }
    }

    private function loadLeaderboard() {
        $filename = 'data/leaderboard.json';
        if (file_exists($filename)) {
            $this->topPlayers = json_decode(file_get_contents($filename), true);
        }
    }

    public function updateLeaderboard(Player $player) {
        $this->topPlayers[$player->getName()] = $player->getBestScore();
        arsort($this->topPlayers);
        $this->topPlayers = array_slice($this->topPlayers, 0, 10);
        $this->saveLeaderboard();
    }

    private function saveLeaderboard() {
        $filename = 'data/leaderboard.json';
        file_put_contents($filename, json_encode($this->topPlayers));
    }

    public function getTopPlayers() {
        return $this->topPlayers;
    }
}
