<?php

namespace Brain\Games\Games\Brain\Prime;

const DESCRIPTION = 'Answer "yes" if the number is prime, otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function playRound(): callable
{
    return function (): array {
        $num = rand(1, 100);
        $rightAnswer = isPrime($num) ? 'yes' : 'no';
        return [$num, $rightAnswer];
    };
}
