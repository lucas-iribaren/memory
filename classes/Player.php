<?php
// classes/Player.php

class Player {
    private $name;
    private $profile = [];

    public function __construct($name) {
        $this->name = $name;
        $this->profile = $this->loadProfile();
    }

    public function getName() {
        return $this->name;
    }

    private function loadProfile() {
        // Charger le profil depuis un fichier JSON ou une base de données
        $filename = 'data/' . $this->name . '.json';
        if (file_exists($filename)) {
            return json_decode(file_get_contents($filename), true);
        } else {
            return ['scores' => []];
        }
    }

    public function saveProfile() {
        // Sauvegarder le profil dans un fichier JSON ou une base de données
        $filename = 'data/' . $this->name . '.json';
        file_put_contents($filename, json_encode($this->profile));
    }

    public function addScore($score) {
        $this->profile['scores'][] = $score;
        $this->saveProfile();
    }

    public function getBestScore() {
        if (empty($this->profile['scores'])) return 0;
        return max($this->profile['scores']);
    }

    public function getProfile() {
        return $this->profile;
    }
}
