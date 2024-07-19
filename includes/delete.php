<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image'])) {
    $galleryDir = realpath('../gallery/');

    $file = $_POST['image'];
    unlink($file);
}
header('Location: ../index.php?page=gallery');
