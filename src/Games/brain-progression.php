<?php

namespace Brain\Games\Games\Brain\Progression;

use Exception;

use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Find the number missing from a progression.';

function generateProgression($firstElement, $increment, $cardinality = 10): array
{
    $progression = [];
    for ($i = 0; $i < $cardinality; $i += 1) {
        $element = $firstElement + $increment * $i;
        $progression[] = $element;
    }
    return $progression;
}

function generateProblem($progression, $hiddenIndex): string
{
    $result = $progression;
    $result[$hiddenIndex] = '..';
    return implode(' ', $result);
}

function playRound(): callable
{
    return function () {
        $firstElement = rand(1, 100);
        $increment = rand(1, 10);
        $progression = generateProgression($firstElement, $increment);
        $hiddenIndex = rand(0, count($progression) - 1);

        $problem = generateProblem($progression, $hiddenIndex);
        $rightAnswer = $progression[$hiddenIndex];
        return [$problem, $rightAnswer];
    };
}
