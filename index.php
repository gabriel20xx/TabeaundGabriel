<?php

$imageFolder = './img';
$incorrect = false;

if (is_dir($imageFolder)) {
    $imageCount = count(array_diff(scandir($imageFolder), ['.', '..']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $pin1 = isset($_POST["pin1"]) ? $_POST["pin1"] : "";
    $pin2 = isset($_POST["pin2"]) ? $_POST["pin2"] : "";
    $pin3 = isset($_POST["pin3"]) ? $_POST["pin3"] : "";
    $pin4 = isset($_POST["pin4"]) ? $_POST["pin4"] : "";
    $pin = $pin1 . $pin2 . $pin3 . $pin4;

    $startDate = new DateTime('2022-06-23');
    $today = new DateTime();

    $interval = date_diff($startDate, $today);
    $daysSince = $interval->format('%a');

    $correctPin = str_pad($daysSince, 4, '0', STR_PAD_LEFT);

    if ($pin == $correctPin) {
        $unlocked = true;
        $incorrect = false;
    } else {
        $incorrect = true;
    }
} else {
    $unlocked = false;
}

include "includes/head.php";
echo '<body class="vh-100 container d-flex flex-column align-items-center justify-content-between text-center">';

// Header
include "includes/header.php";

if ($unlocked) {
    include "main.php";
} else {
    // Login container
    echo '<div>';
    echo '<form id="pin_input" action="/index.php" method="post">';
    echo '<div class="container d-flex flex-column">';
    echo '<h1>Please enter pin code</h1>';
    echo '<div class="my-2">';
    echo '<input id="pin1" name="pin1" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '<input id="pin2" name="pin2" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '<input id="pin3" name="pin3" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '<input id="pin4" name="pin4" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
    echo '</div>';
    echo '<button type="submit" name="submit" class="btn btn-primary">Submit</button>';
    echo '</div>';
    echo '</form>';

    if ($incorrect) {
        echo '<p class="text-danger">Pin is wrong!</p>';
    }

    echo '</div>';

    // JavaScript
    echo '<script src="js/pin.js"></script>';
}

// Footer
include "includes/footer.php";
