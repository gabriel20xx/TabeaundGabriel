<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_POST['image'];
    if (file_exists($file)) {
        unlink($file);
    }
}
header('Location: ../index.php?page=gallery');
