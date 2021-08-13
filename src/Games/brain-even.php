<?php

namespace Src\Games\Brain\Even;

$autoloadPath1 = __DIR__ . '/../../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function Brain\Games\Engine\playGame;
use function cli\line;
use function cli\prompt;

function isEven (int $num): bool
{
    return $num % 2 === 0;
}

function playBrainEven (): array
{
    $num = rand(1, 100);
    line("Question: %d", $num);
    $playerAnswer = prompt("Your answer");
    $rightAnswer = isEven($num) ? 'yes' : 'no';
    return [$playerAnswer, $rightAnswer];
};

