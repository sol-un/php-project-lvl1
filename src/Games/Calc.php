<?php

namespace Brain\Games\Games\Calc;

use Exception;

use function Brain\Games\Engine\playGame;

use const Brain\Games\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Solve the expressions provided.';
const OPERATORS = ['+', '-', '*'];

/**
 * @throws Exception
 */
function solveProblem(string $problem): int
{
    [$operand1, $operator, $operand2] = explode(' ', $problem);
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

function generateProblem(): string
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
        $problem = generateProblem();
        $rightAnswer = solveProblem($problem);
        $gameData[] = [$problem, $rightAnswer];
    }
    return $gameData;
}

function playBrainCalc(): void
{
    playGame(generateGameData(), DESCRIPTION);
}
