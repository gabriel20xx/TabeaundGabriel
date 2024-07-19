<?php

$allButtons = ['lock', 'envelope', 'star', 'heart'];
$mainButtons = ['images'];
$galleryButtons = ['home', 'upload'];

// Initialize $buttonClasses with all buttons by default
$buttonClasses = $allButtons;

// Check if 'page' parameter is set
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
    // Update $buttonClasses based on the 'page' parameter
    if ($page === 'gallery') {
        $buttonClasses = array_merge($galleryButtons, $allButtons);
    } elseif ($page === 'main') {
        $buttonClasses = array_merge($mainButtons, $allButtons);
    }
} else {
    // Default to all buttons if 'page' is not set
    $buttonClasses = $allButtons;
}

// Generate buttons
echo '<div class="button-container">';
foreach ($buttonClasses as $class) {
    echo '<button class="' . htmlspecialchars($class) . '-btn" id="' . htmlspecialchars($class) . 'Button">';
    echo '<i class="bi bi-' . htmlspecialchars($class) . '"></i>';
    echo '</button>';
}
echo '</div>';
?>
