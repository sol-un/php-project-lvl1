<?php

namespace Brain\Games\Games\Brain\Calc;

use Exception;

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

function playRound(): callable
{
    return function (): array {
        $problem = generateProblem();
        $rightAnswer = solveProblem($problem);
        return [$problem, $rightAnswer];
    };
}
