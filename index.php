<?php

$imageFolder = './img';
$incorrect = false;

if (is_dir($imageFolder)) {
    $imageCount = count(array_diff(scandir($imageFolder), ['.', '..']));
}

include "includes/login.php";

include "includes/head.php";
echo '<body class="vh-100 container d-flex flex-column align-items-center justify-content-between text-center">';

// Header
include "includes/header.php";

if ($unlocked) {
    include "includes/router.php";
} else {
    include "login.php";
}

// Footer
include "includes/footer.php";
