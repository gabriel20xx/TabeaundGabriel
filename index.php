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
    include "login.php";
}

// Footer
include "includes/footer.php";
