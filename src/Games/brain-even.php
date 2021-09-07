<?php

namespace Brain\Games\Games\Brain\Even;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function playRound(): callable
{
    return function (): array {
        $num = rand(1, 100);
        $rightAnswer = isEven($num) ? 'yes' : 'no';
        return [$num, $rightAnswer];
    };
}
