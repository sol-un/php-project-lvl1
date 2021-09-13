<?php

namespace Brain\Games\Games\Brain\Progression;

use const Brain\Games\Engine\ROUNDS_COUNT;

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

function generateGameData(): callable
{
    return function (): array {
      $gameData = [];
      for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $firstElement = rand(1, 100);
        $increment = rand(1, 10);
        $progression = generateProgression($firstElement, $increment);
        $hiddenIndex = rand(0, count($progression) - 1);

        $problem = generateProblem($progression, $hiddenIndex);
        $rightAnswer = $progression[$hiddenIndex];
        $gameData[] = [$problem, $rightAnswer];
      }
      return $gameData;
    };
}
