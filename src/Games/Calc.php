<?php

namespace Brain\Games\Games\Calc;

use Exception;

use function Brain\Games\Engine\playGame;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

/**
 * @throws Exception
 */
function calculate(string $expression): int
{
    [$operand1, $operator, $operand2] = explode(' ', $expression);
    switch ($operator) {
        case '+':
            return (int) $operand1 + (int) $operand2;
        case '-':
            return (int) $operand1 - (int) $operand2;
        case '*':
            return (int) $operand1 * (int) $operand2;
        default:
            throw new Exception("Unknown operator: {$operator}");
    }
}

function generateExpression(): string
{
        $operand1 = rand(1, 100);
        $operand2 = rand(1, 100);
        $operator = OPERATORS[array_rand(OPERATORS)];
        return "{$operand1} {$operator} {$operand2}";
}

function generateGameData(): array
{
    $gameData = [];
    for ($i = ROUNDS_COUNT; $i > 0; $i -= 1) {
        $expression = generateExpression();
        $rightAnswer = calculate($expression);
        $gameData[] = [$expression, $rightAnswer];
    }
    return $gameData;
}

function playBrainCalc(): void
{
    playGame(generateGameData(), DESCRIPTION);
}
