<?php

namespace Brain\Games\Games\Brain\Progression;

const DESCRIPTION = 'Find the number missing from a progression.';

function generateProgression(int $firstElement, int $increment, int $cardinality = 10): array
{
    $progression = [];
    for ($i = 0; $i < $cardinality; $i += 1) {
        $element = $firstElement + $increment * $i;
        $progression[] = $element;
    }
    return $progression;
}

function generateProblem(array $progression, int $hiddenIndex): string
{
    $result = $progression;
    $result[$hiddenIndex] = '..';
    return implode(' ', $result);
}

function playRound(): callable
{
    return function (): array {
        $firstElement = rand(1, 100);
        $increment = rand(1, 10);
        $progression = generateProgression($firstElement, $increment);
        $hiddenIndex = rand(0, count($progression) - 1);

        $problem = generateProblem($progression, $hiddenIndex);
        $rightAnswer = $progression[$hiddenIndex];
        return [$problem, $rightAnswer];
    };
}
