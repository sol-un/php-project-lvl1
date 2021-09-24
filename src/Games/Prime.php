<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $num = rand(1, 100);
        $rightAnswer = isPrime($num) ? 'yes' : 'no';
        $gameData[] = [$num, $rightAnswer];
    }
    return $gameData;
}

function playPrime(): void
{
    run(generateGameData(), DESCRIPTION);
}
