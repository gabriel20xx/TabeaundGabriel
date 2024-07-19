<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page === 'gallery') {
        include "../gallery.php";
    }

} else {
    header('Location: ../index.php');
}