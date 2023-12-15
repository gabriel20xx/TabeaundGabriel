<?php

include 'sql_connection.php';

// Handle adding items to the wishlist
if (isset($_POST['add'])) {
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $sql = "INSERT INTO wishlist (item) VALUES ('$item')";
    if (mysqli_query($conn, $sql)) {
        echo '<p>Item added to the wishlist successfully!</p>';
    } else {
        echo '<p>Error adding item: ' . mysqli_error($conn) . '</p>';
    }
}

// Handle removing items from the wishlist
if (isset($_GET['remove'])) {
    $id = mysqli_real_escape_string($conn, $_GET['remove']);
    $sql = "DELETE FROM wishlist WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo '<p>Item removed from the wishlist successfully!</p>';
    } else {
        echo '<p>Error removing item: ' . mysqli_error($conn) . '</p>';
    }
}

// Display the wishlist
$result = mysqli_query($conn, "SELECT id, item FROM wishlist");
if (mysqli_num_rows($result) > 0) {
    echo '<ul class="list-group">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        echo $row['item'];
        echo '<a href="?remove=' . $row['id'] . '" class="badge badge-danger badge-pill">Remove</a>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Your wishlist is empty.</p>';
}

// Close connection
mysqli_close($conn);
