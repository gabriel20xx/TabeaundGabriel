<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image'])) {
    $file = $_POST['image'];

    // Make sure the path is relative to the gallery directory
    $file = realpath($file);

    // Ensure the file is in the gallery directory
    if (strpos($file, realpath('../gallery/')) === 0 && file_exists($file)) {
        unlink($file);
    }
}
header('Location: ../index.php?page=gallery');
