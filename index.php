<?php

const ALLOWED_ACTIONS = ["+", "-", "*", "/", "**"];
const ALLOWED_COMPARISONS = ["==", "===", "!=", "<>", "!==", "<", ">", "<=", ">="];

const ACTION_TYPE_ACTION = 'action';
const ACTION_TYPE_COMPARISON = 'comparison';

echo 'Enter left operand:' . "\n";
$leftOperand = getUserInput();
validateNumericOperand($leftOperand);

echo 'Enter action ("' . implode('", "', ALLOWED_ACTIONS) . '") or ("' . implode('", "', ALLOWED_COMPARISONS) . '"):' . "\n";
$action = getUserInput();
validateAction($action);

echo 'Enter right operand: ' . "\n";
$rightOperand = getUserInput();
validateNumericOperand($rightOperand);

echo 'Result: ' . getResult($leftOperand, $action, $rightOperand) . "\n";

function getUserInput()
{
    return trim(fgets(fopen('php://stdin', 'r')));
}

function getActionType($action)
{
    if (in_array($action, ALLOWED_ACTIONS)) {
        return ACTION_TYPE_ACTION;
    }

    if (in_array($action, ALLOWED_COMPARISONS)) {
        return ACTION_TYPE_COMPARISON;
    }
}

function validateAction($action)
{
    if (in_array($action, ALLOWED_ACTIONS)) {
        return;
    }

    if (in_array($action, ALLOWED_COMPARISONS)) {
        return;
    }

    die('Incorrect action. Please enter correct one' . "\n");
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

function compareTwoNumbers($leftOperand, $action, $rightOperand)
{
    if ($action === '==') {
        return $leftOperand == $rightOperand;
    }

    if ($action === '===') {
        return $leftOperand === $rightOperand;
    }

    if ($action === '!=') {
        return $leftOperand != $rightOperand;
    }

    if ($action === '!==') {
        return $leftOperand != $rightOperand;
    }

    if ($action === '<>') {
        return $leftOperand <> $rightOperand;
    }

    if ($action === '<') {
        return $leftOperand < $rightOperand;
    }
    if ($action === '>') {
        return $leftOperand > $rightOperand;
    }

    if ($action === '<=') {
        return $leftOperand <= $rightOperand;
    }

    if ($action === '>=') {
        return $leftOperand >= $rightOperand;
    }
}

function getResult($leftOperand, $action, $rightOperand)
{
    $actionType = getActionType($action);

    if ($actionType === ACTION_TYPE_ACTION) {
        return calcTwoNumbers($leftOperand, $action, $rightOperand);
    }

    if ($actionType === ACTION_TYPE_COMPARISON) {
        return compareTwoNumbers($leftOperand, $action, $rightOperand) ? 'true' : 'false';
    }
}