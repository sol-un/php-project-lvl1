<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function playGame(array $gameData, string $description): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line($description);
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        [$problem, $rightAnswer] = $gameData[$i];
        line("Question: {$problem}");
        $playerAnswer = prompt("Your answer");
        if ($playerAnswer !== (string) $rightAnswer) {
            line("The answer '{$playerAnswer}' is wrong :( The correct answer is '{$rightAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
    return;
}
