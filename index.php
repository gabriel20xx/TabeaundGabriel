<?php

define('ACCESS_ALLOWED', true);

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

include "includes/login.php";

include "includes/head.php";
echo '<body class="vh-100 container d-flex flex-column align-items-center justify-content-between text-center">';

// Header
include "includes/header.php";

if ($unlocked) {
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
include "includes/footer.php";
