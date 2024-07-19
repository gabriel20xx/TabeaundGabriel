<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image'])) {
    // Define the gallery directory
    $galleryDir = realpath('../gallery/');

    // Sanitize and validate the file input
    $file = basename($_POST['image']);
    $filePath = $galleryDir . DIRECTORY_SEPARATOR . $file;

    // Check if the file exists in the gallery directory
    if (file_exists($filePath) && strpos($filePath, $galleryDir) === 0) {
        // Attempt to delete the file
        unlink($filePath);
    }
}
header('Location: ../index.php?page=gallery');
?>
