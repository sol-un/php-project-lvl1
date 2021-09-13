<?php

namespace Brain\Games\Games\Brain\Even;

use function Brain\Games\Engine\playGame;
use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function generateGameData(): array
{
  $gameData = [];
  for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
    $num = rand(1, 100);
    $rightAnswer = isEven($num) ? 'yes' : 'no';
    $gameData[] = [$num, $rightAnswer];
  }
  return $gameData;
}

function playBrainEven(): void
{
  playGame(generateGameData(), DESCRIPTION);
}
