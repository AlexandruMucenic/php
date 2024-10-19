<?php

function displayText()
{
    $text = 'Hello, World!';
    echo "<p class='output'><i>$text</i></p>";
}

function displayCircleArea()
{
    $radius = 5;
    $area = M_PI * pow($radius, 2);
    echo "<p class='output'>Area of circle with radius $radius is " . number_format($area, 2) . "</p>";
}

function displayTemperatureConversion()
{
    $fahrenheit = 75.5;
    $celsius = (5 / 9) * ($fahrenheit - 32);
    echo "<p class='output'>Temperature in Fahrenheit: " . number_format($fahrenheit, 1) . "&deg;F</p>";
    echo "<p class='output'>Temperature in Celsius: " . number_format($celsius, 1) . "&deg;C</p>";
}

function displayStringLength()
{
    $string = 'Learning PHP';
    echo "<p class='output'>The string '$string' has " . strlen($string) . " characters</p>";
}

function displayLetterAfterPattern()
{
    $string = "ABCDEFABCDEF";
    $pattern = "DEF";
    $result = strpos($string, $pattern) !== false ? $string[strpos($string, $pattern) + strlen($pattern)] : null;
    echo "<p class='output'>First letter after '$pattern' is '$result'</p>";
}

function displayLetterAfterLetter()
{
    $string = "HELLOHELLO";
    $letter = "O";
    $result = strpos($string, $letter) !== false ? $string[strpos($string, $letter) + strlen($letter)] : null;
    echo "<p class='output'>First letter after '$letter' is '$result'</p>";
}

function displayLastCharacters()
{
    $text = "Programming";
    $chars = 4;
    echo "<p class='output'>Last $chars characters of '$text' are '" . substr($text, -$chars) . "'</p>";
}

function displaySpecialCharacters()
{
    echo "<p class='output'>Escape sequences are essential in PHP.</p>";
    echo "<p class='output'>Example: C:\\directory\\file.txt</p>";
}

function displayStringTransformations()
{
    $string = "hello php world";
    echo "<p class='output'>Original: '$string'</p>";
    echo "<p class='output'>Uppercase: '" . strtoupper($string) . "'</p>";
    echo "<p class='output'>Lowercase: '" . strtolower($string) . "'</p>";
    echo "<p class='output'>First Letter Uppercase: '" . ucfirst($string) . "'</p>";
    echo "<p class='output'>Words Capitalized: '" . ucwords($string) . "'</p>";
}

function displayRemoveSubstring()
{
    $string = "subdomain.example.com";
    $trim = "subdomain.";
    echo "<p class='output'>From '$string' removing '$trim': '" . str_replace($trim, '', $string) . "'</p>";
}

function displayRemoveLeadingZeros()
{
    $string = "000456700";
    echo "<p class='output'>From '$string' removing leading zeros: '" . ltrim($string, '0') . "'</p>";
}

function displayExtractUsername()
{
    $email = "user.name@domain.com";
    $username = explode('@', $email)[0];
    echo "<p class='output'>Username from '$email' is '$username'</p>";
}

function displayRemoveSubstringFromString()
{
    $string = "This is a sample string";
    $remove = "sample ";
    echo "<p class='output'>From '$string' removing '$remove': '" . str_replace($remove, '', $string) . "'</p>";
}

function displayExtractFilename()
{
    $path = "/home/user/docs/resume.pdf";
    echo "<p class='output'>Filename from '$path' is '" . basename($path) . "'</p>";
}

function displayEvenOddCheckIfElse()
{
    $numbers = [4, 7];
    foreach ($numbers as $num) {
        echo "<p class='output'>Number $num is " . ($num % 2 == 0 ? "even" : "odd") . "</p>";
    }
}

function displayEvenOddCheckTernary()
{
    $numbers = [9, 2];
    foreach ($numbers as $num) {
        echo "<p class='output'>Number $num is " . ($num % 2 == 0 ? "even" : "odd") . "</p>";
    }
}

function displayMaximumOfThreeNumbers()
{
    $a = 12;
    $b = 15;
    $c = 9;
    echo "<p class='output'>Maximum between $a, $b, and $c is " . max($a, $b, $c) . "</p>";
}

function displaySumOfDigits()
{
    $number = 5432;
    $sum = array_sum(str_split($number));
    echo "<p class='output'>Sum of digits in $number is $sum</p>";
}

function displayFibonacciSequence()
{
    $limit = 20;
    $sequence = [0, 1];
    while (end($sequence) + prev($sequence) <= $limit) {
        $sequence[] = end($sequence) + prev($sequence);
    }
    echo "<p class='output'>Fibonacci numbers up to $limit: " . implode(', ', $sequence) . "</p>";
}

function displaySystemInformation()
{
    echo "<p class='output'>Client IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "</p>";
    echo "<p class='output'>Browser: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown') . "</p>";
    echo "<p class='output'>Current File: " . basename($_SERVER['PHP_SELF']) . "</p>";
}
