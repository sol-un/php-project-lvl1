<?php

namespace Brain\Games\Games\Brain\Gcd;

use Exception;

use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Find the greatest common divisor of the numbers provided.';

function gcd($num1, $num2): int
{
    return ($num1 % $num2) ? gcd($num2, $num1 % $num2) : $num2;
}

function solveProblem($problem): int
{
    [$num1, $num2] = explode(' ', $problem);
    return gcd($num1, $num2);
}

function generateProblem(): string
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    return "{$num1} {$num2}";
}

function playRound(): callable
{
    return function () {
        $problem = generateProblem();
        $rightAnswer = solveProblem($problem);
        return [$problem, $rightAnswer];
    };
}
