<?php 
include "includes/head.php";
?>
<body>
    <?php
    // Header
    include "includes/header.php";
    ?>

    <h1>Gallery</h1>
    <div>
        <?php
        $directory = 'gallery/';
        $images = glob($directory . "*.{jpg,png,gif,jpeg}", GLOB_BRACE);

        foreach($images as $image) {
            echo '<div style="display: inline-block; margin: 10px; text-align: center;">';
            echo '<img src="' . $image . '" style="width: 150px; height: 150px;"><br>';
            echo '<form action="delete.php" method="post" style="display:inline;">';
            echo '<input type="hidden" name="image" value="' . $image . '">';
            echo '<button type="submit">Delete</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="floating-button">
        <h1>Upload Image</h1>
        <form action="includes/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <button class="upload-btn" id="uploadButton" type="submit">
            <i class="bi bi-upload"></i>'
            </button>
        </form>
    </div>
</body>
</html>