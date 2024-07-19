<?php

$imageFolder = './img';
$incorrect = false;

if (is_dir($imageFolder)) {
    $imageCount = count(array_diff(scandir($imageFolder), ['.', '..']));
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

include "parts/login.php";

include "parts/head.php";
echo '<body class="vh-100 container d-flex flex-column align-items-center justify-content-between text-center">';

// Header
include "parts/header.php";

if ($unlocked) {
    define('ACCESS_ALLOWED', true);
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page === 'main') {
            include_once "pages/main.php";
        }
        if ($page === 'gallery') {
            include_once "pages/gallery.php";
        }
    
    } else {
        include_once "pages/main.php";
    }
} else {
    include "pages/login.php";
}

// Footer
include "parts/footer.php";
