<?php

// Простий клас літери
class Letter {
    private $character;

    public function __construct($character) {
        $this->character = $character;
    }

    public function getCharacter() {
        return $this->character;
    }
}

// Фабрика пристосуванця
class LetterFactory {
    private $letters = [];

    // Метод отримання пристосованця
    public function getLetter($character) {
        if (!isset($this->letters[$character])) {
            $this->letters[$character] = new Letter($character);
        }

        return $this->letters[$character];
    }
}

// Використання паттерна Притосуванець
$factory = new LetterFactory();

$letterA = $factory->getLetter('A');
$letterB = $factory->getLetter('B');
$letterA2 = $factory->getLetter('A');

// Літери 'A' і 'B' будуть створені один раз, і вони будуть використовуватись більше одного разу
echo $letterA->getCharacter() . PHP_EOL;  // A
echo $letterB->getCharacter() . PHP_EOL;  // B
echo $letterA2->getCharacter() . PHP_EOL; // A

echo ($letterA === $letterA2) ? "Same object" : "Different objects"; // Same object
