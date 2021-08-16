<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function playGame($playRound, $description)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        [$playerAnswer, $rightAnswer] = $playRound();
        if ($playerAnswer !== $rightAnswer) {
            line("The answer '%s' is wrong :( The correct answer is '%s'.", $playerAnswer, $rightAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
