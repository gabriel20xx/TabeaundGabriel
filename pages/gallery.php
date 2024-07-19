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
            echo '<img src="' . htmlspecialchars($image) . '" style="width: 150px; height: 150px; object-fit: contain;"><br>';
            echo '<form action="../includes/delete.php" method="post" style="display:inline;">';
            echo '<input type="hidden" name="image" value="' . htmlspecialchars($image) . '">';
            echo '<button type="submit">Delete</button>';
            echo '</form>';
            echo '</div>';
        }
    echo '</div>';

    echo '<div class="floating-button">';
    echo '<form action="../includes/upload.php" method="post" enctype="multipart/form-data">';
    echo '<input type="file" name="image" id="fileInput" style="display: none;" required>';
    echo '<button type="button" class="upload-btn" onclick="document.getElementById(\'fileInput\').click();">';
    echo '<i class="bi bi-upload"></i>';
    echo '</button>';
    echo '</form>';
    echo '</div>';

    echo '<script>';
    echo 'document.getElementById(\'fileInput\').addEventListener(\'change\', function() {';
    echo 'this.parentElement.submit();';
    echo '});';
    echo '</script>';
}
?>