<?php

const ALLOWED_ACTIONS = ["+", "-", "*", "/", "**"];

echo 'Enter left operand:' . "\n";
$leftOperand = getUserInput();
checkNumericOperand($leftOperand);

echo 'Enter action ("' . implode('", "', ALLOWED_ACTIONS) . '"):' . "\n";
$action = getUserInput();
checkAction($action);

echo 'Enter right operand: ' . "\n";
$rightOperand = getUserInput();
checkNumericOperand($rightOperand);

echo 'Result: ' . calcTwoNumbers($leftOperand, $action, $rightOperand) . "\n";

function getUserInput()
{
    return trim(fgets(fopen('php://stdin', 'r')));
}

function checkAction($action)
{
    if (!in_array($action, ALLOWED_ACTIONS)) {
        die('Incorrect action. Please enter correct one' . "\n");
    }
}

function checkNumericOperand($operand)
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
