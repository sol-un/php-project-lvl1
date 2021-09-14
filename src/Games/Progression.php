<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\playGame;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(int $firstElement, int $increment, int $cardinality = 10): array
{
    $progression = [];
    for ($i = 0; $i < $cardinality; $i += 1) {
        $element = $firstElement + $increment * $i;
        $progression[] = $element;
    }
    return $progression;
}

function hideElementByIndex(array $progression, int $hiddenIndex): string
{
    $result = $progression;
    $result[$hiddenIndex] = '..';
    return implode(' ', $result);
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $firstElement = rand(1, 100);
        $increment = rand(1, 10);
        $progression = generateProgression($firstElement, $increment);
        $hiddenIndex = rand(0, count($progression) - 1);

        $progressionWithHiddenIndex = hideElementByIndex($progression, $hiddenIndex);
        $rightAnswer = $progression[$hiddenIndex];
        $gameData[] = [$progressionWithHiddenIndex, $rightAnswer];
    }
    return $gameData;
}

function playBrainProgression(): void
{
    playGame(generateGameData(), DESCRIPTION);
}
