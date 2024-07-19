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

include "includes/login.php";

include "includes/head.php";
echo '<body class="vh-100 container d-flex flex-column align-items-center justify-content-between text-center">';

// Header
include "includes/header.php";

if ($unlocked) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page === 'main') {
            include_once "main.php";
        }
        if ($page === 'gallery') {
            include_once "gallery.php";
        }
    
    } else {
        include "index.php";
    }
} else {
    include "login.php";
}

// Footer
include "includes/footer.php";
