<?php 
include "includes/head.php";
?>
<body>
    <?php
    // Header
    include "includes/header.php";
    ?>

    <h1>Gallery</h1>

    <div class="floating-button">
        <form action="includes/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="fileInput" style="display: none;" required>
            <button type="button" class="upload-btn" onclick="document.getElementById('fileInput').click();">
                <i class="bi bi-upload"></i>
            </button>
        </form>
    </div>

    <div>
        <?php
        $directory = 'gallery/';
        $images = array_merge(
            glob($directory . "*.jpg"),
            glob($directory . "*.png"),
            glob($directory . "*.gif"),
            glob($directory . "*.jpeg")
        );

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

    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            this.parentElement.submit();
        });
    </script>
</body>
</html>