<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\playGame;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd(int $num1, int $num2): int
{
    return (bool) ($num1 % $num2) ? gcd($num2, $num1 % $num2) : $num2;
}

function calculate(string $numberPair): int
{
    [$num1, $num2] = explode(' ', $numberPair);
    return gcd((int) $num1, (int) $num2);
}

function generateNumberPair(): string
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    return "{$num1} {$num2}";
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $numberPair = generateNumberPair();
        $rightAnswer = calculate($numberPair);
        $gameData[] = [$numberPair, $rightAnswer];
    }
    return $gameData;
}

function playBrainGcd(): void
{
    playGame(generateGameData(), DESCRIPTION);
}
