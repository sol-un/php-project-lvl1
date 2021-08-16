<?php

namespace Brain\Games\Games\Brain\Progression;

use Exception;
use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Find the number missing from a progression.';

function solveProblem ($problem): int
{
    [$num1, $num2] = explode(' ', $problem);
    return gcd($num1, $num2);
}

function generateProblem ($numbers): string
{
    $numbersCopy = array(...$numbers);
    $hiddenIndex = array_rand($numbersCopy);
    $numbersCopy[$hiddenIndex] = '..';
    return implode(' ', $numbersCopy);
}

function playRound (): callable
{
    return function () {
        $problem = generateProblem($numbers);
        line("Question: %s", $problem);
        $playerAnswer = (int) prompt("Your answer");
        $rightAnswer = solveProblem($problem);
        return [$playerAnswer, $rightAnswer];
    };
}
