<?php

namespace Brain\Games\Games\Calc;

use Exception;

use function Brain\Games\Engine\run;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

/**
 * @throws Exception
 */
function calculate(int $operand1, int $operand2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        case '*':
            return $operand1 * $operand2;
        default:
            throw new Exception("Unknown operator: {$operator}");
    }
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $operand1 = rand(1, 100);
        $operand2 = rand(1, 100);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $rightAnswer = calculate($operand1, $operand2, $operator);
        $gameData[] = ["{$operand1} {$operator} {$operand2}", $rightAnswer];
    }
    return $gameData;
}

function playCalc(): void
{
    run(generateGameData(), DESCRIPTION);
}
