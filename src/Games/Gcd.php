<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\playGame;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of the numbers provided.';

function gcd(int $num1, int $num2): int
{
    return (bool) ($num1 % $num2) ? gcd($num2, $num1 % $num2) : $num2;
}

function solveProblem(string $problem): int
{
    [$num1, $num2] = explode(' ', $problem);
    return gcd((int) $num1, (int) $num2);
}

function generateProblem(): string
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    return "{$num1} {$num2}";
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $problem = generateProblem();
        $rightAnswer = solveProblem($problem);
        $gameData[] = [$problem, $rightAnswer];
    }
    return $gameData;
}

function playBrainGcd(): void
{
    playGame(generateGameData(), DESCRIPTION);
}
