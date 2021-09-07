<?php

namespace Brain\Games\Games\Brain\Gcd;

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

function playRound(): callable
{
    return function (): array {
        $problem = generateProblem();
        $rightAnswer = solveProblem($problem);
        return [$problem, $rightAnswer];
    };
}
