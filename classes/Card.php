<?php
// classes/Card.php

class Card {
    private $id;
    private $image;
    private $isMatched = false;

    public function __construct($id, $image) {
        $this->id = $id;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }

    public function getImage() {
        return $this->image;
    }

    public function isMatched() {
        return $this->isMatched;
    }

    public function setMatched($isMatched) {
        $this->isMatched = $isMatched;
    }

    public function flip() {
        // Logique pour retourner la carte (afficher ou cacher)
    }

    public function checkMatch($otherCard) {
        return $this->id === $otherCard->getId();
    }
}
