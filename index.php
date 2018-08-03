<?php

const ALLOWED_ACTIONS = ["+", "-", "*", "/", "**"];
const ALLOWED_COMPARISONS = ["==", "===", "!=", "<>", "!==", "<", ">", "<=", "=>"];

echo 'Enter left operand:' . "\n";
$leftOperand = getUserInput();
validateNumericOperand($leftOperand);

echo 'Enter action ("' . implode('", "', ALLOWED_ACTIONS) . '"):' . "\n";
$action = getUserInput();
validateAction($action);

echo 'Enter right operand: ' . "\n";
$rightOperand = getUserInput();
validateNumericOperand($rightOperand);

echo 'Result: ' . calcTwoNumbers($leftOperand, $action, $rightOperand) . "\n";

function getUserInput()
{
    return trim(fgets(fopen('php://stdin', 'r')));
}

function validateAction($action)
{
    if (!in_array($action, ALLOWED_ACTIONS)) {
        die('Incorrect action. Please enter correct one' . "\n");
    }
}

function validateNumericOperand($operand)
{
    if (!is_numeric($operand)) {
        die('Incorrect operand. Please enter correct one' . "\n");
    }
}

function calcTwoNumbers($leftOperand, $action, $rightOperand)
{
    if ($action === '+') {
        return $leftOperand + $rightOperand;
    }

    if ($action === '-') {
        return $leftOperand - $rightOperand;
    }

    if ($action === '*') {
        return $leftOperand * $rightOperand;
    }

    if ($action === '/') {
        return $leftOperand / $rightOperand;
    }

    if ($action === '**') {
        return $leftOperand ** $rightOperand;
    }
}
