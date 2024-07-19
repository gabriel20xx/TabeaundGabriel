<?php
if (!defined('ACCESS_ALLOWED')) {
    header('Location: ../index.php');
} else {
    echo '<h1>Gallery</h1>';

    echo '<div>';
    $directory = 'gallery/';
    $images = array_merge(
        glob($directory . "*.jpg"),
        glob($directory . "*.png"),
        glob($directory . "*.gif"),
        glob($directory . "*.jpeg")
    );
    
    foreach ($images as $image) {
        echo '<div style="display: inline-block; margin: 10px; text-align: center;">';
        echo '<img src="' . htmlspecialchars($image) . '" style="width: 20vh; height: 20vh; object-fit: contain;"><br>';
        echo '<form action="../includes/delete.php" method="post" style="display:inline;">';
        echo '<input type="hidden" name="image" value="' . htmlspecialchars($image) . '">';
        echo '<button type="submit">Delete</button>';
        echo '</form>';
        echo '</div>';
    }
    echo '</div>';

    // Button container
    include "../parts/buttons.php";
}
    ?>