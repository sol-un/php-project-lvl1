<?php

namespace Brain\Games\Games\Brain\Even;

use function cli\line;
use function cli\prompt;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven (int $num): bool
{
    return $num % 2 === 0;
}

function playRound (): callable
{
    return function () {
        $num = rand(1, 100);
        line("Question: %d", $num);
        $playerAnswer = prompt("Your answer");
        $rightAnswer = isEven($num) ? 'yes' : 'no';
        return [$playerAnswer, $rightAnswer];
    };
}
