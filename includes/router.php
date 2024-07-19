<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page === 'main') {
        include "../main.php";
    }
    if ($page === 'gallery') {
        include "../gallery.php";
    }

} else {
    header('Location: ../index.php');
}