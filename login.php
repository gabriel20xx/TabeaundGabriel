<?php
// Login container
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

echo '<div>';
echo '<form id="pin_input" action="includes/router.php?page=' . $page . '" method="post">';
echo '<div class="container d-flex flex-column">';
echo '<h1>Please enter pin code</h1>';
echo '<div class="my-2">';
echo '<input id="pin1" name="pin1" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
echo '<input id="pin2" name="pin2" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
echo '<input id="pin3" name="pin3" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
echo '<input id="pin4" name="pin4" type="number" step="1" min="0" max="9" autocomplete="no" maxlength="1" class="pin-input m-2" />';
echo '</div>';
echo '<button type="submit" name="submit" class="btn btn-primary">Submit</button>';
echo '</div>';
echo '</form>';

if ($incorrect) {
    echo '<p class="text-danger">Pin is wrong!</p>';
}

echo '</div>';

// JavaScript
echo '<script src="js/pin.js"></script>';
?>