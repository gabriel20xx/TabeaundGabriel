<?php
session_start(); // Start session

$imageFolder = './img';
$incorrect = false;

if (is_dir($imageFolder)) {
    $imageCount = count(array_diff(scandir($imageFolder), ['.', '..']));
}

$page = isset($_GET['page']) ? $_GET['page'] : 'main';

$startDate = new DateTime('2022-06-23');
$today = new DateTime();

$interval = date_diff($startDate, $today);
$daysSince = $interval->format('%a');

$correctPin = str_pad($daysSince, 4, '0', STR_PAD_LEFT);

include "includes/login.php";

include "parts/head.php";
echo '<body class="vh-100 container d-flex flex-column align-items-center justify-content-between text-center">';

// Header
include "parts/header.php";

if (isset($_SESSION['pin']) && $_SESSION['pin'] === $correctPin) {
    define('ACCESS_ALLOWED', true);
    
    if ($page === 'main') {
        include_once "pages/main.php";
    } elseif ($page === 'gallery') {
        include_once "pages/gallery.php";
    } else {
        include_once "pages/main.php"; // Fallback to main if page is not recognized
    }

    // JavaScript
    echo '<script src="js/fallanimation.js"></script>';
    echo '<script src="js/envelope.js"></script>';
    echo '<script src="js/show-hide.js"></script>';
    echo '<script src="js/lock.js"></script>';
} else {
    include "pages/login.php";
}

// Footer
include "parts/footer.php";
?>
