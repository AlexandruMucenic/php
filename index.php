<?php
require_once 'exercises.php';
define('PI', round(pi(), 2));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <button onclick="window.location.href='/php/'" class="back-button">Back</button>

    <h1>Exercises</h1>

    <div class="exercise">
        <h2>Exercise 1: Text Display</h2>
        <?php displayText(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 2: Circle Area</h2>
        <?php displayCircleArea(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 3: Temperature Conversion</h2>
        <?php displayTemperatureConversion(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 4: String Length</h2>
        <?php displayStringLength(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 5: Find Letter After Pattern</h2>
        <?php displayLetterAfterPattern(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 6: Find Letter After Letter</h2>
        <?php displayLetterAfterLetter(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 7: Last Characters</h2>
        <?php displayLastCharacters(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 8: Special Characters</h2>
        <?php displaySpecialCharacters(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 9: String Transformations</h2>
        <?php displayStringTransformations(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 10: Remove Substring</h2>
        <?php displayRemoveSubstring(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 11: Remove Leading Zeros</h2>
        <?php displayRemoveLeadingZeros(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 12: Extract Username</h2>
        <?php displayExtractUsername(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 13: Remove Substring</h2>
        <?php displayRemoveSubstringFromString(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 14: Extract Filename</h2>
        <?php displayExtractFilename(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 15: Even/Odd Check (if-else)</h2>
        <?php displayEvenOddCheckIfElse(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 16: Even/Odd Check (ternary)</h2>
        <?php displayEvenOddCheckTernary(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 17: Maximum of Three Numbers</h2>
        <?php displayMaximumOfThreeNumbers(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 18: Sum of Digits</h2>
        <?php displaySumOfDigits(); ?>
    </div>

    <div class="exercise">
        <h2>Exercise 19: Fibonacci Sequence</h2>
        <?php displayFibonacciSequence(); ?>
    </div>

    <div class="exercise">
        <h2>System Information</h2>
        <?php displaySystemInformation(); ?>
    </div>
</body>

</html>
