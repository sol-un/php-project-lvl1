<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd(int $num1, int $num2): int
{
    return $num1 % $num2 === 0 ? $num2 : gcd($num2, $num1 % $num2);
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $rightAnswer = gcd($num1, $num2);
        $gameData[] = ["{$num1} {$num2}", $rightAnswer];
    }
    return $gameData;
}

function playGcd(): void
{
    run(generateGameData(), DESCRIPTION);
}
