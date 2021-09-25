<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $question = rand(1, 100);
        $rightAnswer = isEven($question) ? 'yes' : 'no';
        $gameData[] = [$question, $rightAnswer];
    }
    return $gameData;
}

function playEven(): void
{
    run(generateGameData(), DESCRIPTION);
}
