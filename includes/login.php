<?php
session_start(); // Start the session

include "pin.php";

// Check if the site is already unlocked
if (isset($_SESSION['pin']) && $_SESSION['pin'] === $correctPin) {
    // If unlocked, no need to check the PIN again
    $unlocked = true;
    $incorrect = false;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $pin1 = isset($_POST["pin1"]) ? $_POST["pin1"] : "";
        $pin2 = isset($_POST["pin2"]) ? $_POST["pin2"] : "";
        $pin3 = isset($_POST["pin3"]) ? $_POST["pin3"] : "";
        $pin4 = isset($_POST["pin4"]) ? $_POST["pin4"] : "";
        $pin = $pin1 . $pin2 . $pin3 . $pin4;

        if ($pin == $correctPin) {
            $_SESSION['pin'] = $pin; // Store the PIN in session
            $unlocked = true;
            $incorrect = false;
        } else {
            $incorrect = true;
            $unlocked = false;
        }
    } else {
        $unlocked = false;
    }
}
?>